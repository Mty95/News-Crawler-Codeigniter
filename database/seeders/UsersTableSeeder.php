<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UsersTableSeeder extends \Mty95\NewFramework\Seeder
{
    public function run(\Faker\Generator $faker, int $amount = 1)
    {
    	$repository = \App\Model\User\Repository::take();

		/*$user = new \App\Model\User\User();
		$user->role_id = 1;
		$user->first_name = 'Admin';
		$user->last_name = 'Admin';
		$user->email = 'aa@bb.com';
		$user->password = password_hash('12345', PASSWORD_BCRYPT);
		$user->cellphone = $faker->phoneNumber;

		$repository->save($user);*/

		for ($i = 1; $i <= $amount; $i++)
		{
			$user = new \App\Model\User\User();
			$user->role_id = $faker->randomElement([1,2,3,4,5]);
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->email = $faker->email;
			$user->password = password_hash('12345', PASSWORD_BCRYPT);
			$user->cellphone = $faker->phoneNumber;
			$user->biography = $faker->realText(100);

			$title = $faker->titleMale;
			$avatarId = 0;
			if (in_array($title, ['Sr.', 'Dn.', 'Dr.', 'Lic.', 'Ing.']))
			{
				$avatarId = $faker->randomElement([4, 5, 7, 8, 11, 15, 36, 38, 53]);
			}

			if (in_array($title, ['Sra.', 'Srta.', 'Dra.', 'Lic.', 'Ing.']))
			{
				$avatarId = $faker->randomElement([6, 9, 10, 12, 13, 14, 16, 17, 18, 39, 51, 52, 53, 54, 55]);
			}

			$user->avatar = sprintf('img/bg-img/%s.jpg', $avatarId);

			$repository->save($user);

			echo sprintf('Created the user with id #%s |%s|' . PHP_EOL, $user->id, $title);
		}
    }
}
