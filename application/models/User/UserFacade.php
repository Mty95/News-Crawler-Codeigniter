<?php
namespace App\Model\User;

use App\Exceptions\UserException;
use App\Exceptions\ValidationFieldException;
use App\Repositories;
use Mty95\NewFramework\Validation\FacadeValidatorTrait;
use NewFramework\Logger;
use NewFramework\Validator;
use NewFramework\Exceptions\ValidationException;

class UserFacade
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
        $this->validator = Validator::take(User::class);
    }

    /**
     * @param array $data
     * @return User
     *
     * @throws ValidationException
     */
    public function create(array $data): User
    {
        $isValidate = $this->validator->validate($data, ['create', 'onTest']);

        if (!$isValidate)
        {
            throw ValidationException::notValid();
        }

        return new User($data);
    }

	/**
	 * @param string $email
	 * @param string $password
	 * @return User
	 * @throws ValidationException
	 * @throws ValidationFieldException
	 */
    public function doLogin(string $email, string $password): User
    {
		$isValidate = $this->validator->validate([
			'email' => $email,
			'password' => $password,
		], ['login']);

		if (!$isValidate)
		{
			Logger::write(__METHOD__, json_encode($this->errors()));
			throw ValidationException::notValid();
		}

		$user = $this->repository->where('email', $email)->get();

		if (!password_verify($password, $user->password))
		{
			throw ValidationFieldException::notValid('Contraseña incorrecta', 'password');
		}

		return $user;
    }
}
