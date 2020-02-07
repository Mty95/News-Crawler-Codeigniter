<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_005 extends NewFramework\Migration
{
    public function up(): void
    {
		DbSchema::create('user_roles', static function (Blueprint $table) {
			$table->increments('id');
			$table->string('type');
			$table->string('name', 255);
			$table->longText('description');
			$table->int('status')->default(1);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->timestamp('deleted_at');
		});

        DbSchema::create('users', static function (Blueprint $table) {
            $table->increments('id');
            $table->int('role_id')->default(1);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255);
            $table->longText('password');
            $table->string('cellphone', 100);
            $table->int('status')->default(1);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->timestamp('deleted_at');
        });

        $db = \App\Services::db();
        $db->insert('user_roles', [
        	'id' => 1,
			'type' => 'administrator',
			'name' => 'Administrator',
			'description' => 'Web Site Administrator',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);
		$db->insert('user_roles', [
			'id' => 2,
			'type' => 'owner',
			'name' => 'Owner',
			'description' => 'Web Site Owner',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);
		$db->insert('user_roles', [
			'id' => 3,
			'type' => 'writer',
			'name' => 'Writer',
			'description' => 'Web Site Writer',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);
		$db->insert('user_roles', [
			'id' => 4,
			'type' => 'free_user',
			'name' => 'Free User',
			'description' => 'Free User',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);
		$db->insert('user_roles', [
			'id' => 5,
			'type' => 'premium_user',
			'name' => 'Premium User',
			'description' => 'Premium User',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);
    }

    public function down(): void
    {
        DbSchema::dropIfExists('user_roles');
        DbSchema::dropIfExists('users');
    }
}
