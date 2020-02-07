<?php
namespace App\Model\Category;

/**
 * Class Category
 * @package App\Model\Category
 *
 * @property-read int $id;
 * @property string $title;
 * @property string $original_link;
 * @property-read \DateTime $created_at;
 * @property-read \DateTime $updated_at;
 * @property-read \DateTime $deleted_at;
*/
class Category extends \NewFramework\Entity
{
    protected $attributes = [
        'id' => null,
		'title' => null,
		'original_link' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
    ];
    
    protected $protected = ['id'];
}
