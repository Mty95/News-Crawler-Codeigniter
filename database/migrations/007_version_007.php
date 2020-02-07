<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_007 extends NewFramework\Migration
{
	public function up(): void
	{
		DbSchema::create('sources', static function (Blueprint $table) {
			$table->increments('id');
			$table->string('slug');
			$table->string('name');
			$table->string('url');
			$table->string('home_url');
			$table->string('thumbnail');
			$table->tinyInt('active')->default(1);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->timestamp('deleted_at');
		});

		$db = \App\Services::db();
		$db->insert('sources', [
			'id' => 1,
			'slug' => 'gestion',
			'name' => 'Gestión.pe',
			'url' => 'https://gestion.pe/',
			'home_url' => 'https://gestion.pe/',
			'thumbnail' => 'sources/gestion.png',
			'active' => 1,
		]);

		// -----------------------
		DbSchema::addColumn('posts', static function(Blueprint $table) {
			$table->int('source_id')->notNull()->default(0)->after('category_id');
		});

		$db->update('posts', [
			'source_id' => 1
		]);
	}

	public function down(): void
	{
		DbSchema::dropIfExists('sources');
		DbSchema::dropColumn('posts', 'source_id');
	}
}
