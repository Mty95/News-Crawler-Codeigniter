<?php
/**
 * Created by PhpStorm.
 * User: kawaii
 * Date: 30/01/2020
 * Time: 03:25 PM
 */

namespace App\Model;


use App\Model\Source\Repository;
use App\Services;

class WidgetModel
{
    public function categoriesList(array $params = [])
    {
        $db = Services::db();
        $query = $db->query('SELECT c.id, c.title, COUNT(p.id) AS \'count\' FROM `categories` AS c LEFT JOIN posts as p ON p.category_id = c.id WHERE p.enabled = 1 GROUP BY c.id ORDER BY count DESC');
        $query = $query->result();

        return view('home/widgets/categories_list', [
            'categories' => $query,
        ], true);
    }

	public function sourcesList(array $params = [])
	{
		return view('home/widgets/sources-list', [
			'sources' => Repository::take()->findAll(),
		], true);
    }
}
