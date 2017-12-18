<?php
namespace app\api\controller\v1;
use think\Validate;
use think\Exception;
use app\lib\exception\BannerMissException;
// use app\api\validate\TestValidate;
class Banner{
	/**
	 * [getBanner description]
	 * @param  [type] $id [banner的id号]
	 * @return [type]     [description]
	 * @url /banner/:id
	 * @author xiaodo 2017-12-17
	 */
	
	public function getBanner($id){
		Validate('IDMustBePostiveInt')->doCheck();
		
		$banner=model('Banner')->getBannerByID($id);

		// $array=[
		// 	'error_code'=>10001,
		// 	'msg'=>$ex->getMessage()
		// ];
		// return json($array,400);
		if(!$banner){
			throw new BannerMissException();
		}
	
		return $banner;
	


		


	}

}