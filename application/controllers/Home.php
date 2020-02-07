<?php

use App\Exceptions\ValidationFieldException;
use App\Library\Mty95\SimpleApiRestTrait;
use App\Model\Category\Category;
use App\Model\Category\Repository as CategoryRepository;
use App\Model\Post\Post;
use App\Model\Post\Repository as PostRepository;
use App\Model\User\UserFacade;
use Core\Controller\AuthController;
use Mty95\NewFramework\Exceptions\DataException;
use NewFramework\Exceptions\EntityException;

class Home extends AuthController
{
	use SimpleApiRestTrait;

    protected $module = 'home';
    protected $resourceUrl = 'home';

    public function index(): void
    {
        $postRepository = PostRepository::take();
		$render = $this->render('home', [
			'title' => 'My CI News',
			'posts' => $postRepository->where('enabled', 1)->last(4),
			'mostViewedPosts' => $postRepository->where('enabled', 1)
				->orderBy('num_views', 'DESC')->last(5),
			'mostCommentedPosts' => $postRepository->where('enabled', 1)
				->orderBy('num_comments', 'DESC')->last(5),
		]);
    }

    public function post(?int $postId = null): void
    {
        if (null === $postId || $postId === 0)
        {
            redirect();return;
        }

        $postRepository = PostRepository::take();
        $post = $postRepository->find($postId);


        if (null === $post)
        {
            show_404();return;
        }

		$this->postAction($post, $postRepository);
	}

    public function archive(?int $categoryId = null, ?string $dateString = null): void
    {
        $date = DateTime::createFromFormat('Y-m-d', $dateString);

        if (false === $date)
        {
            $date = new DateTime('now');
        }

        $categoryRepository = CategoryRepository::take();

		if (null === $categoryId || $categoryId === 0)
		{
			$category = null;
		} else {
			$category = $categoryRepository->find($categoryId);
		}

		$this->archiveAction($category, $date, $categoryRepository);
	}

	/**
	 * @param Post $post
	 * @param PostRepository $postRepository
	 * @throws DataException
	 * @throws EntityException
	 */
	private function postAction(Post $post, PostRepository $postRepository): void
	{
		$post->num_views++;
		$postRepository->save($post);
		$postRepository->applyFilters();

		$this->render('post', [
			'title' => 'Post',
			'post' => $post,
			'author' => \App\Model\User\Repository::take()->find($post->author_id),
			'morePosts' => $postRepository->where('enabled', true)->last(6),
		]);
	}

	/**
	 * @param $category
	 * @param DateTime $date
	 * @param CategoryRepository $categoryRepository
	 */
	private function archiveAction(?Category $category, DateTime $date, CategoryRepository $categoryRepository): void
	{
		$postRepository = PostRepository::take();
		$categoryTitle = null !== $category ? $category->title : 'Últimas noticias';

		if (null !== $category)
		{
			$postRepository->where('category_id', $category->id);
		}

		$this->render('archive', [
			'title' => 'Archive',
			'category_title' => $categoryTitle,
			'category_id' => null !== $category ? $category->id : 'todas',
			'date' => $date,
			'posts' => $postRepository
				->where('enabled', 1)
				->orderBy('created_at', 'DESC')
				->whereDate('created_at', $date->format('Y-m-d'))->findAll(),
			'categories' => $categoryRepository->findAll(),
		]);
	}

	public function login(): void
	{
		if (null !== $this->user)
		{
			redirect();return;
		}

		$this->render('login');
	}

	public function login_post(): void
	{
		$facade = new UserFacade();
		try {
			$user = $facade->doLogin($this->input->post('email'), $this->input->post('password'));
		} catch (ValidationFieldException $e) {
			header('Content-Type: application/json');
			echo json_encode([
				'status' => false,
				'message' => $e->getMessage(),
				'fields' => [$e->getField() => $e->getMessage()],
			]);
			return;
		} catch (Exception $e) {
			$this->fail([
				'message' => $e->getMessage(),
				'fields' => $facade->errors(),
			]);
			return;
		}
		$this->setUserSession($user);
		$this->success(['message' => 'Datos correctos, ingresando al sistema...']);
	}

	public function logout(): void
	{
		if (null === $this->user)
		{
			redirect();return;
		}

		$this->destroyUserSession();
		redirect('login');
	}

	public function myAccount(): void
	{
		if (null === $this->user)
		{
			redirect();return;
		}

		$this->render('my-account');
	}
}
