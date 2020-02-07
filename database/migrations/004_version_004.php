<?php defined('BASEPATH') OR exit('No direct script access allowed');

use NewFramework\Migration\Blueprint;
use NewFramework\Migration\DbSchema;

class Migration_Version_004 extends NewFramework\Migration
{
    public function up()
    {
        DbSchema::addColumn('posts', function (Blueprint $table) {
            $table->int('num_views')->after('enabled')->notNull();
            $table->int('num_comments')->after('num_views')->notNull();
        });
    }

    public function down()
    {
        DbSchema::dropColumn('posts', 'num_views');
        DbSchema::dropColumn('posts', 'num_comments');
    }
}