<?php
use NewFramework\Orm\JoinClause;

return [
    'entityClass' => \App\Model\Source\Source::class,
    'repositoryClass' => \App\Model\Source\Repository::class,
    'tableName' => 'sources',
    'primaryKey' => 'id',
    'softDeletes' => false,
    'joins' => [
    ],
    'casts' => [
        'active' => 'int',
    ],
    'validation' => [
        'rules' => [
        ],
        'titles' => [
        ],
        'messages' => [
        ],
    ],
];