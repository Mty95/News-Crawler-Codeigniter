<?php
namespace App\Model\Post;

use Mty95\NewFramework\Exceptions\DataException;
use Mty95\NewFramework\Validation\FacadeValidatorTrait;
use NewFramework\Exceptions\EntityException;
use NewFramework\Validator;
use NewFramework\Exceptions\ValidationException;

class PostFacade
{
    use FacadeValidatorTrait;

    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var Validator
     */
    private $validator;

    public function __construct()
    {
        $this->repository = Repository::take();
        $this->validator = Validator::take(Post::class);
    }

    /**
     * @param array $data
     * @return Post
     *
     * @throws ValidationException
     */
    public function create(array $data): Post
    {
        $isValidate = $this->validator->validate($data, ['create', 'onTest']);

        if (!$isValidate)
        {
            throw ValidationException::notValid();
        }

        return new Post($data);
    }

	/**
	 * @param Post $post
	 * @return Post
	 * @throws ValidationException
	 * @throws DataException
	 * @throws EntityException
	 */
    public function insert(Post $post): Post
	{
		$isValidate = $this->validator->validate($post->toArray(), ['create']);

		if (!$isValidate)
		{
			throw ValidationException::notValid();
		}

		$this->repository->save($post);

		return $post;
    }
}
