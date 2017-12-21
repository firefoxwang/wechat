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
	public function getBannerByID($id){
		$data=[
			'banner_id'=>$id
		];
		// $res=Db::table('banner_item')->where($data)->select();
		// echo $this->getLastSql();
		// header("Content-type:text/html;code=utf-8");
		// var_dump($res);exit;
		$res=Db::table('banner_item')
		->where(function($query) use ($id){
			$query->where('banner_id','=',$id);

		})
		->select();
		return $res;
	}
}