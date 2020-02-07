<?php
namespace App\Model\Source;

/**
 * Class Source
 * @package App\Model\Source
 *
 * @property-read int $id;
 * @property $slug;
 * @property $name;
 * @property $url;
 * @property $home_url;
 * @property $thumbnail;
 * @property $active;
*/
class Source extends \NewFramework\Entity
{
    protected $attributes = [
        'id' => null,
		'slug' => null,
		'name' => null,
		'url' => null,
		'home_url' => null,
		'thumbnail' => null,
		'active' => null,
    ];
    
    protected $protected = ['id'];
}