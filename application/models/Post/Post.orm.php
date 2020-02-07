<?php
use NewFramework\Orm\JoinClause;

return [
    'entityClass' => \App\Model\Post\Post::class,
    'repositoryClass' => \App\Model\Post\Repository::class,
    'tableName' => 'posts',
    'primaryKey' => 'id',
    'softDeletes' => false,
    'joins' => [
        (new JoinClause('category_name', 'title'))->on('(main).category_id = categories.id')->direction('LEFT'),
        (new JoinClause('source_name', 'name'))->on('(main).source_id = sources.id')->direction('LEFT'),
    ],
    'casts' => [
        'category_id' => 'int',
        'enabled' => 'bool',
        'num_views' => 'int',
        'num_comments' => 'int',
        'author_id' => 'int',
    ],
    'validation' => [
        'rules' => [
            'create' => [
                'slug' => 'trim|required|is_unique[posts.slug]',
                'title' => 'trim|required|is_unique[posts.title]',
                'original_link' => 'trim|required',
                'small_description' => 'trim',
                'thumbnail' => 'trim',
                'category_id' => 'trim|required|numeric',
				'author_id' => 'trim|required',
            ]
        ],
        'titles' => [
        ],
        'messages' => [
        ],
    ],
];
