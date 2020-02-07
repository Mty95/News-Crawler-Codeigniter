<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_001 extends NewFramework\Migration
{
    public function up()
    {
        DbSchema::create('posts', function (Blueprint $table){
            $table->increments('id');

            $table->longText('title');
            $table->longText('subtitle');
            $table->string('original_link');
            $table->string('small_description');
            $table->longText('content');
            $table->longText('message');
            $table->string('thumbnail');
            $table->int('category_id');
            $table->tinyInt('enabled');

            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at');
        });
    }

    public function down()
    {
        DbSchema::dropIfExists('posts');
    }
}