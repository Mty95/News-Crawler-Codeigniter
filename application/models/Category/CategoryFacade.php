<?php
namespace App\Model\Category;

use Mty95\NewFramework\Exceptions\DataException;
use Mty95\NewFramework\Validation\FacadeValidatorTrait;
use NewFramework\Exceptions\EntityException;
use NewFramework\Validator;
use NewFramework\Exceptions\ValidationException;

class CategoryFacade
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
        $this->validator = Validator::take(Category::class);
    }

    /**
     * @param array $data
     * @return Category
     *
     * @throws ValidationException
     */
    public function create(array $data): Category
    {
        $isValidate = $this->validator->validate($data, ['create', 'onTest']);

        if (!$isValidate)
        {
            throw ValidationException::notValid();
        }

        return new Category($data);
    }

	/**
	 * @param Category $category
	 * @return Category
	 * @throws ValidationException
	 * @throws DataException
	 * @throws EntityException
	 */
    public function insert(Category $category): Category
	{
    	$isValidate = $this->validator->validate($category->toArray(), ['create']);

    	if (!$isValidate)
		{
			throw ValidationException::notValid();
		}

    	$this->repository->save($category);

    	return $category;
    }
}
