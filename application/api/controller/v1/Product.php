<?php
namespace app\api\controller\v1;
/**
* 
*/
use app\lib\exception\ProductException;
class Product
{
	public function getRecent($count=15){
		validate('Count')->docheck();
		$products=model('Product')->getMostRecent($count);
		if($products->isEmpty()){
			throw new ProductException();
		}
		$products=$products->hidden(['summary']);
		return $products;

	}
	public function getAllInCategory($id){
		validate('IDMustBePostiveInt')->docheck();
		$products=model('Product')->getProductByCategoryID($id);
		if($products->isEmpty()){
			throw new ProductException();
		}
		return $products;


	}
	public function getOne($id){
		validate('IDMustBePostiveInt')->doCheck();
		$product=model('Product')->getProductDetail($id);
		if(empty($product)){
			throw new ProductException();
		}
		return $product;
	}
}