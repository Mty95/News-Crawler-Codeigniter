<?php defined('BASEPATH') OR exit('No direct script access allowed');

return [
    'orm' => [
        \App\Model\Post\Post::class => 'models/Post/Post.orm.php',
        \App\Model\Category\Category::class => 'models/Category/Category.orm.php',
        \App\Model\User\User::class => 'models/User/User.orm.php',
        \App\Model\Source\Source::class => 'models/Source/Source.orm.php',
    ],
];