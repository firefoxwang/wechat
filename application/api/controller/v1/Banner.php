<?php
namespace app\api\controller\v1;
use think\Validate;
use think\Exception;
use app\lib\exception\BannerMissException;
use app\api\model\Banner as BannerModel;
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
		// $banner=BannerModel::with('items')->find($id);	

		$banner=model('Banner')->with(['items','items.img'])->find($id);
		// echo $this->getLastSql();exit;
		// $banner=model('Banner')->getBannerByID($id);

		if(!$banner){
			throw new BannerMissException();
		}
		return json($banner);


		


	}

}