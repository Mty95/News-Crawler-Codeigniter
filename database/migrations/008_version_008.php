<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_008 extends NewFramework\Migration
{
    public function up()
    {
		DbSchema::addColumn('posts', static function(Blueprint $table) {
			$table->longText('slug')->after('subtitle');
		});
    }

    public function down()
    {
		DbSchema::dropColumn('posts', 'slug');
    }
}
