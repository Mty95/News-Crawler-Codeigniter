<?php
namespace App\Model\Post;

/**
 * Class Post
 * @package App\Model\Post
 *
 * @property-read int $id
 * @property $title
 * @property $subtitle
 * @property string $slug
 * @property $original_link
 * @property $small_description
 * @property $content
 * @property $author_id
 * @property $message
 * @property $thumbnail
 * @property $big_image
 * @property $category_id
 * @property $source_id
 * @property $enabled
 * @property $num_views
 * @property $num_comments
 * @property-read \DateTime $created_at
 * @property-read \DateTime $updated_at
 * @property-read \DateTime $deleted_at
 *
 * @property-read string $source_name
*/
class Post extends \NewFramework\Entity
{
    protected $attributes = [
        'id' => null,
		'title' => null,
		'subtitle' => null,
		'slug' => null,
		'original_link' => null,
		'small_description' => null,
		'content' => null,
		'message' => null,
		'author_id' => null,
		'thumbnail' => null,
		'big_image' => null,
		'category_id' => null,
		'source_id' => null,
		'enabled' => null,
		'num_views' => null,
		'num_comments' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null,
    ];
    
    protected $protected = ['id'];

    public function getCreatedDate(): string
    {
        return $this->created_at->format('D d, Y');
    }

    public function getCreatedHour(): string
    {
        return $this->created_at->format('H:i A');
    }

    public function parseContent(): string
    {
        return str_replace('/resizer/', 'https://gestion.pe/resizer/', $this->content);
    }

    public function showLink(): string
    {
        return base_url('post/' . $this->id);
    }

	public function showCategoryLink(): string
	{
		return base_url('archivo/' . $this->category_id);
    }
}
