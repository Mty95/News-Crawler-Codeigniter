<?php
use NewFramework\Orm\JoinClause;

return [
    'entityClass' => \App\Model\User\User::class,
    'repositoryClass' => \App\Model\User\Repository::class,
    'tableName' => 'users',
    'primaryKey' => 'id',
    'softDeletes' => false,
    'joins' => [
    ],
    'casts' => [
        'role_id' => 'int',
        'status' => 'int',
    ],
    'validation' => [
        'rules' => [
        	'login' => [
        		'email' => 'trim|required|valid_email|exists[users.email]',
				'password' => 'trim|required|min_length[5]',
			],
        ],
        'titles' => [
        ],
        'messages' => [
        	'exists' => 'Este {field} no existe.',
        ],
    ],
];
