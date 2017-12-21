<?php
namespace app\api\model;
use think\Model;
use think\Exception;
use think\Db;

class BannerItem extends Model
{
	/**
	 * [getBannerByID description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 * @author xiaodo 2017-12-17
	 */
	public function getBannerByID($id){
		// $res=Db::table('banner_item')->where('banner_id','=',$id)->select();
		// header("Content-type:text/html;code=utf-8");
		$data=[
			'banner_id'=>$id,
		];
		$res=$this->where($data)->select();
		echo $this->getLastSql();
		var_dump($res);exit;
		return $res;
	}
}