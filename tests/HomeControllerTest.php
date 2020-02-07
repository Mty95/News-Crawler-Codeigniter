<?php
namespace Tests;

use App\Model\Post\Post;
use App\Model\Post\Repository;
use App\Repositories;
use NewFramework\Logger;
use Tests\CiPhpUnitTest\TestCase;

class HomeControllerTest extends TestCase
{
	/**
	 * @test
	 */
	public function getPost(): void
	{
		$post = Repository::take()->find(55);

		$this->assertNotNull($post);
	}

	/**
	 * @test
	 */
	public function getInvalidPost(): void
	{
		$post = Repository::take()->find(175621);

		$this->assertNull($post);
	}

	/**
	 * @test
	 */
	public function homePostMethod(): void
	{
		/** @var Post $post */
		$repository = Repository::take();
		$post = $repository->order('RANDOM')->get();

		$output = $this->request('GET', sprintf('post/%s', $post->id));

		$this->assertContains(
			sprintf('<h4 class="post-title">%s</h4>', $post->title),
			$output
		);
	}

	/**
	 * @test
	 */
	public function homePostMethodWithInvalidPost(): void
	{
		$output = $this->request('GET', 'post/123456');

		$this->assertNotContains('<h4 class="post-title">', $output);
	}
}
