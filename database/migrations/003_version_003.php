<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_003 extends NewFramework\Migration
{
    public function up()
    {
        DbSchema::addColumn('posts', function (Blueprint $table) {
            $table->longText('big_image')->after('thumbnail');
        });
    }

    public function down()
    {
        DbSchema::dropColumn('posts', 'big_image');
    }
}