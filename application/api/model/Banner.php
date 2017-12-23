<?php
namespace app\api\model;
use think\Model;
use think\Exception;
use think\Db;

class Banner extends Model
{
	protected $table='';
	protected $hidden=['update_time','delete_time'];
	/**
	 * [关联模型 关联item]
	 * @return [type] [description]
	 * @author liangguangchuan 2017-12-21
	 */
	public function items(){
		return $this->hasMany('BannerItem','banner_id','id');
	}
	/**
	 * [getBannerByID description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 * @author xiaodo 2017-12-17
	 */
	public function getBannerByID($id){
		// $data=[
		// 	'banner_id'=>$id
		// ];
		// // $res=Db::table('banner_item')->where($data)->select();
		// // echo $this->getLastSql();
		// // header("Content-type:text/html;code=utf-8");
		// // var_dump($res);exit;
		// $res=Db::table('banner_item')
		// ->where(function($query) use ($id){
		// 	$query->where('banner_id','=',$id);

		// })
		// ->select();
		$banner=$this->with(['items','items.img'])->find($id);
		return $banner;
	}
}