<?php
namespace App\Library;

use NewFramework\Entity;

class Collection
{
    /**
     * @param Entity[] $result
     * @return Entity[]
     */
    public static function toArray(array $result): array
    {
        return array_map(static function(Entity $entity) {
            return $entity->toArray();
        }, $result);
    }
}