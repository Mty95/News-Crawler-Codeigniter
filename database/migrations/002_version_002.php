<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_002 extends NewFramework\Migration
{
    public function up()
    {
        DbSchema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title');
            $table->longText('original_link');

            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at');
        });
    }

    public function down()
    {
        DbSchema::dropIfExists('categories');
    }
}