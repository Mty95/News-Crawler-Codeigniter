<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_006 extends NewFramework\Migration
{
    public function up(): void
    {
        DbSchema::addColumn('posts', static function(Blueprint $table) {
        	$table->int('author_id')->notNull()->after('message');
		});

		DbSchema::addColumn('users', static function(Blueprint $table) {
			$table->longText('biography')->notNull()->default('')->after('cellphone');
			$table->longText('avatar')->notNull()->default('')->after('biography');
		});
    }

    public function down(): void
    {
		DbSchema::dropColumn('posts', 'author_id');
		DbSchema::dropColumn('users', 'biography');
		DbSchema::dropColumn('users', 'avatar');
    }
}
