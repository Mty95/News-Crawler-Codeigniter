<?php
namespace App\Model\User;

/**
 * Class User
 * @package App\Model\User
 *
 * @property-read int $id;
 * @property $role_id;
 * @property $first_name;
 * @property $last_name;
 * @property $email;
 * @property $password;
 * @property $cellphone;
 * @property $biography;
 * @property $avatar;
 * @property $status;
 * @property-read \DateTime $created_at;
 * @property-read \DateTime $updated_at;
 * @property-read \DateTime $deleted_at;
*/
class User extends \NewFramework\Entity
{
    protected $attributes = [
        'id' => null,
		'role_id' => null,
		'first_name' => null,
		'last_name' => null,
		'email' => null,
		'password' => null,
		'cellphone' => null,
		'biography' => null,
		'avatar' => null,
		'status' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
    ];
    
    protected $protected = ['id'];

	public function getAvatarImage(): string
	{
		if ($this->avatar === '')
		{
			return assets('img/bg-img/0.jpg');
		}

		return assets($this->avatar);
    }
}
