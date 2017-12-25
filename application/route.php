<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'na.me' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', [`	'method' => 'post']],
//     ],

// ];
use think\Route;
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
//product商品

// Route::get('api/:version/product/bycategory','api/:version.Product/getAllInCategory');
// Route::get('api/:version/product/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
// Route::get('api/:version/product/recent','api/:version.Product/getRecent');
Route::group('api/:version/product',function(){
					Route::get('/by_category','api/:version.Product/getAllInCategory');
					Route::get('/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
					Route::get('/recent','api/:version.Product/getRecent');
});

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

Route::post('api/:version/token/user','api/:version.Token/getToken');
//地址
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');