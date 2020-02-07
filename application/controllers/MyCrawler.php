<?php

use App\Model\Post\Post;
use NewFramework\Controller;
use Symfony\Component\DomCrawler\Crawler;

class MyCrawler extends Controller
{
	public function index()
	{
		$this->crawElComercio();
		$this->crawlerGestionPage('https://gestion.pe/');
	}

	/**
	 * @param string $page
	 * @todo Load JS and images with "PHP PhantomJS" https://stackoverflow.com/questions/36673638/how-to-crawl-with-php-goutte-and-guzzle-if-data-is-loaded-by-javascript
	 */
	public function indexOld(string $page = ''): void
	{
//		$this->crawlerGestionPage('https://gestion.pe/');
		$model = new \App\Model\SourceCrawler\LaRepublica(
			new \Symfony\Component\BrowserKit\HttpBrowser(\Symfony\Component\HttpClient\HttpClient::create()),
			\App\Model\Source\Repository::take()->find(2)
		);
		$model->crawlerMainPage(
			new \App\Model\Category\CategoryFacade(),
			new \App\Model\Post\PostFacade(),
			\App\Model\Category\Repository::take()
		);

		$postRepository = \App\Model\Post\Repository::take();
		/** @var Post[] $posts */
		$posts = $postRepository->where('enabled', false)
			->where('source_id', 2)
			->first(5);

		foreach ($posts as $post)
		{
			try {
				$model->crawlerSinglePage($postRepository, $post);
				echo sprintf('Post con id <b>#%s</b> actualizado con éxito.<br>', $post->id);
			} catch (Exception $e) {
				echo sprintf('Error al guardar el post con id #%s: <b>%s</b><br>', $post->id, $e->getMessage());
			}
		}
	}

	private function crawlerGestionPage(string $pageUrl): void
	{
		$browser = new \Symfony\Component\BrowserKit\HttpBrowser(\Symfony\Component\HttpClient\HttpClient::create());
		$crawler = $browser->request('GET', $pageUrl . '/ultimas-noticias/');

		$crawler = $crawler->filter('#fusion-app > div > div.flex.flex-col.content-layout-container.w-full.position-relative.bg-container > div.content-sidebar.flex.mt-20.mb-20 > div > div:nth-child(n) > div:nth-child(n) > div.story-item__bottom')
			->each(static function(Crawler $node) {
				// ============================================================
				$categoryFacade = new \App\Model\Category\CategoryFacade();
				$postFacade = new \App\Model\Post\PostFacade();
				$post = new Post();

				$node->filter('div.story-item__information-box.w-full > h2 > a')
					->each(static function (Crawler $crawler) use ($post){
						$post->title = $crawler->text();
						$post->slug = make_slug($post->title);
						$post->original_link = $crawler->attr('href');
					});

				$node->filter('div.story-item__information-box.w-full > p')
					->each(static function (Crawler $crawler) use ($post){
						$post->small_description = $crawler->text();
					});

				$node->filter('figure > a > picture > img')
					->each(static function (Crawler $crawler) use ($post){
						$post->thumbnail = $crawler->attr('src');
					});

				$categoryTitle = '';
				$categoryLink = '';
				$node->filter('div:nth-child(n) > div.flex > a')
					->each(static function (Crawler $crawler) use (&$categoryTitle, &$categoryLink){
						$categoryTitle = $crawler->text();
						$categoryLink = $crawler->attr('href');
//                        echo_data([$categoryTitle, $categoryLink]);
					});

//                echo_dump($post->toArray());

				// ============================================================
				$category = \App\Model\Category\Repository::take()->where('title', $categoryTitle)->get();
				if (null === $category)
				{
					$category = new \App\Model\Category\Category();
					$category->title = $categoryTitle;
					$category->original_link = $categoryLink;
//                    echo_dump($category->toArray());
					$categoryFacade->insert($category);
					echo_dump("Agregado la categoría {$category->title} con id #{$category->id}");
				}

				$post->category_id = $category->id;
//                echo_dump($post->toArray());

				$postTemp = \App\Model\Post\Repository::take()->where('title', $post->title)->get();
				if (null === $postTemp)
				{
					$post->author_id = 120;
					$post->source_id = 1;
					$post->enabled = true;

					try {
						$postFacade->insert($post);
						echo_dump("Agregado el post {$post->title} | con id #{$post->id}");
					} catch (Exception $e) {
						var_dump("no se pudo insertar el post con el título {$post->title}| Error: " . $e->getMessage());
						var_dump($postFacade->errors());
						echo '<hr>';
					}
				}
			});

		/** @var Post[] $posts */
		$posts = \App\Model\Post\Repository::take()->where('enabled', false)->last(3);
//		$posts = \App\Model\Post\Repository::take()->find(720);
//		$posts = [$posts];

		foreach ($posts as $post)
		{
			$this->scrapPostPage($pageUrl, $browser, $post);
		}
	}

	private function scrapPostPage(string $pageUrl, \Symfony\Component\BrowserKit\HttpBrowser $browser, Post $post): void
	{
		$crawler = $browser->request('GET', $pageUrl . $post->original_link);

		$crawler->filter('#fusion-app > div > div.flex.flex-col.content-layout-container.w-full.position-relative.bg-container > section')
			->each(static function (Crawler $crawler) use ($post) {
//                echo $crawler->html();

				$crawler->filter('div:nth-child(n) > div.story-header__header-title.w-full.text-white > h2')
//                $crawler->filter('h2')
					->each(static function (Crawler $crawler) use ($post){
//                        echo_dump($crawler->text());
						$post->subtitle = $crawler->text();
					});

				$crawler->filter('#contenedor > section')
					->each(static function (Crawler $crawler) use ($post) {
//                        echo $crawler->html();
						$post->content = $crawler->html();
					});

				$crawler->filter('div.story-content > picture')
					->each(static function (Crawler $crawler) use ($post) {
						$crawler->filter('img')->each(static function (Crawler $crawler) use ($post) {
							$post->big_image = $crawler->attr('src');
						});
					});

				if ($post->big_image === '')
				{
					$crawler->filter('#galery-ul > li:nth-child(1) > div > picture')
						->each(static function(Crawler $crawler) use ($post) {
							$crawler->filter('img')
								->each(static function (Crawler $crawler) use ($post) {
									$post->big_image = $crawler->attr('data-src');
//									echo sprintf('<img src="%s">', $crawler->attr('data-src'));
								});
						});
				}
			});
//        echo $crawler->html();
		echo '<hr>';

		if (/*$post->subtitle !== '' && */$post->content !== '')
		{
			$post->enabled = true;
		}

		try {
			\App\Model\Post\Repository::take()->save($post);
		} catch (\NewFramework\Exceptions\EntityException $e) {
			echo_dump("(Post #{$post->id}) Error: " . $e->getMessage());
		}

		echo_dump("Post #{$post->id} se ha actualizado con éxito.");
	}

	private function crawElComercio(): void
	{
		$source = \App\Model\Source\Repository::take()->find(3);
		$model = new \App\Model\SourceCrawler\ElComercio(
			new \Symfony\Component\BrowserKit\HttpBrowser(\Symfony\Component\HttpClient\HttpClient::create()),
			$source
		);

		$model->crawlerMainPage(
			new \App\Model\Category\CategoryFacade(),
			new \App\Model\Post\PostFacade(),
			\App\Model\Category\Repository::take()
		);

		$postRepository = \App\Model\Post\Repository::take();
		/** @var Post[] $posts */
		$posts = $postRepository->where('enabled', false)
			->where('source_id', $source->id)
			->first(3);
//		$posts = $postRepository->find(479);
//		$posts = [$posts];

		foreach ($posts as $post) {
			try {
				$model->crawlerSinglePage($postRepository, $post);
				echo sprintf('Post con id <b>#%s</b> actualizado con éxito.<br>', $post->id);
			} catch (Exception $e) {
				echo sprintf('Error al guardar el post con id #%s: <b>%s</b><br>', $post->id, $e->getMessage());
			}
		}
	}
}
