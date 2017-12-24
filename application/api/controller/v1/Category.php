<?php
namespace app\api\controller\v1;

/**
* 
*/
use app\lib\exception\CategoryException;
class Category
{
	
	public function getAllCategories(){
		$categories=model('Category')->all([],'img');
		if($categories->isEmpty()){
			throw new CategoryException();
		}
		return $categories;
	}
}