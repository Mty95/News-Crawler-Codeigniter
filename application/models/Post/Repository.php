<?php
namespace App\Model\Post;

/**
 * Class Repository
 * @package App\Model\Post
 *
 * @method Post create(array $data = [])
 * @method Post clone(Post $entity)
 * @method int save(Post $entity)
 * @method Post findOrFail($id, string $entity = 'Post')
 * @method Post find($id)
 * @method Post get()
 * @method Post[] findAll(int $limit = 0, int $offset = 0)
*/
class Repository extends \NewFramework\Repository
{
    public function applyFilters(): self
    {
        return $this;
    }
}
