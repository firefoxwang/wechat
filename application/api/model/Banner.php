<?php
namespace app\api\model;
use think\Model;
use think\Exception;
use think\Db;

class Banner extends Model
{
	/**
	 * [getBannerByID description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 * @author xiaodo 2017-12-17
	 */
	public static function getBannerByID($id){
		$res=DB::query('select * from banner_item where banner_id=?',[$id]);
		
		return $res;
	}
}