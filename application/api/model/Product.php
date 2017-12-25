<?php
namespace app\api\model;
/**
* 
*/

class Product extends BaseModel
{
	protected $hidden=[
		'delete_time','main_img_id','pivot','from','create_time','update_time',
	];
	
	public function getMainImgUrlAttr($value,$data){
		return $this->prefixImGUrl($value,$data);
	}
	public static function getMostRecent($count){
		return self::limit($count)
					->order('create_time desc')
					->select();
	}
	public function imgs(){
		return $this->hasMany('ProductImage','product_id','id');
	}
	public function properties(){
		return $this->hasMany('ProductProperty','product_id','id');
	}


	public static function getProductByCategoryID($categoryID){
		$products=self::where('category_id','=',$categoryID)
				->select();
		return $products;

	}
	public static function getProductDetail($id){
		$product=self::with('imgs,properties')
						->find($id);
		return $product;
	}
}