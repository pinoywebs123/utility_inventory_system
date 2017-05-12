<?php

use App\User;
use App\Item;

Route::get('add', function(){
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


//Route Staff
Route::get('/main', [
	'as'=> 'staff',
	'uses'=> 'StaffController@main'
]);

Route::get('/staff/item/{item_id}', [
	'as'=> 'staff_borrow',
	'uses'=> 'StaffController@staff_borrow'
]);
Route::post('/staff/item/{item_id}', [
	'as'=> 'borrow_item',
	'uses'=> 'StaffController@borrow_item'
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

Route::get('/logout', [
	'as'=> 'logout',
	'uses'=>'StaffController@logout'
]);