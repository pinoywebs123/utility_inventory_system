<?php

use App\User;
use App\Item;

Route::get('/add', function(){
	$user = new User;
	$user->lname = 'askal';
	$user->fname = 'piyolo';
	$user->mname = 'wawawe';
	$user->email = 'email@yahoo.com';
	$user->username = 'admin456';
	$user->password = bcrypt('admin456');
	$user->save();
	});
Route::get('/item', function(){
	$item = new Item;
	$item->name = 'chairs';
	$item->quantity = 120;
	$item->save();
});

//Route authentication

Route::get('/', [
	'as'=> 'index',
	'uses'=> 'AuthController@main'
]);
Route::post('/login', [
	'as'=> 'login',
	'uses'=> 'AuthController@login'
]);

Route::get('/register', [
	'as'=> 'register',
	'uses'=> 'AuthController@register'
]);

Route::post('/register',[
	'as'=> 'register_check',
	'uses'=> 'AuthController@register_check'
]);


//Route Staff
Route::get('/main', [
	'as'=> 'staff',
	'uses'=> 'StaffController@main'
]);

Route::get('/staff_consume', [
	'as'=> 'staff_consume',
	'uses'=> 'StaffController@staff_consume'
]);

Route::get('/staff/item/{item_id}', [
	'as'=> 'staff_borrow',
	'uses'=> 'StaffController@staff_borrow'
]);
Route::post('/staff/item/{item_id}', [
	'as'=> 'borrow_item',
	'uses'=> 'StaffController@borrow_item'
]);
Route::post('/staff/consume/{item_id}', [
	'as'=> 'consume_item_check',
	'uses'=> 'StaffController@comsume_item'
]);
Route::get('/staff/comsume/{item_id}', [
	'as'=> 'consume_item',
	'uses'=> 'StaffController@consume_item'
]);
Route::get('/staff/{item_id}/borrowed_item', [
	'as'=> 'view_borrowed_item',
	'uses'=> 'StaffController@view_borrowed_item'
]);
Route::get('/staff/{item_id}/{borrowed_id}/', [
	'as'=> 'staff_return',
	'uses'=> 'StaffController@staff_return'
]);
Route::post('/staff/additem', [
	'as'=> 'add_item',
	'uses'=> 'StaffController@add_item'
]);
Route::post('/staff/search', [
	'as'=> 'staff_search',
	'uses'=> 'StaffController@search'
]);

Route::get('/staff/inventory', [
	'as'=> 'staff_inventory',
	'uses'=> 'StaffController@staff_inventory'
]);

Route::get('/staff/inventory-new', [
	'as'=> 'staff_inventory_new',
	'uses'=> 'StaffController@staff_inventory_new'
]);



Route::get('/staff/reposrts', [
	'as'=> 'staff_report',
	'uses'=> 'StaffController@staff_report'
]);

Route::get('/logout', [
	'as'=> 'logout',
	'uses'=>'StaffController@logout'
]);

//USER Route

Route::group(['prefix'=> 'user'], function(){

	Route::get('/main',[
		'as'=> 'user_main',
		'uses'=> 'UserController@user_main'
	]);
		Route::get('/consumable',[
			'as'=> 'user_consume',
			'uses'=> 'UserController@user_consume'
		]);

	Route::get('/m-r', [
		'as'=> 'user_mr',
		'uses'=> 'UserController@user_mr'
	]);

	Route::get('/logout', [
		'as'=> 'user_logout',
		'uses'=> 'UserController@user_logout'
	]);
});