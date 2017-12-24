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
	
}