<?php
Route::get('user/','clean\web\adapter\controllers\UserController@view');
Route::post('api/v1/user/','clean\web\adapter\controllers\UserController@create');