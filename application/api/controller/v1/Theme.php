<?php
namespace app\api\controller\v1;
/**
* 
*/
use app\lib\exception\ThemeException;
class Theme 
{
	/**
	 * [getSimpleList ]
	 *@url /theme?ids=id1,id2,id3....
	 * @return [type] [一组theme模型]
	 * @author liangguangchuan 2017-12-23
	 */
	public function getSimpleList($ids=''){
		validate('IDCollection')->docheck($ids);
		$ids=explode(',',$ids);
		$result=model('Theme')->with(['topicImg','headImg'])->select($ids);
		if($result->isEmpty()){
			throw new ThemeException();
		}
		return $result;

	}	

	public function getComplexOne($id){
		validate('IDMustBePostiveInt')->doCheck($id);
		$theme=model('Theme')->getThemeWithProducts($id);
		if(empty($theme)){
			throw new ThemeException();
		}

		// return model('Theme')->with('products')->find($id);
		return $theme;
	}
}