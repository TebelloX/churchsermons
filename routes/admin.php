<?php

Route::get('/home', 'AdminsController@home')->name('home');

Route::get('/sermons', 'SermonsController@allSermonsPage')->name('allsermons_path');
Route::get('/sermon/upload', 'SermonsController@uploadPage');
Route::get('/sermon/{slug}/new', 'SermonsController@newSermonForm');
Route::post('/sermon/new', 'SermonsController@saveNewSermon');
Route::get('/sermon/{slug}/edit', 'SermonsController@editSermonPage');
Route::patch('/sermon/{slug}/update', 'SermonsController@updateSermon');

Route::get('/categories', 'CategoriesController@categoriesPage')->name('categoriespage_path');
Route::get('/services', 'ServicesController@servicesPage')->name('servicepage_path');
Route::get('/users', 'UsersController@usersPage')->name('userpage_path');
Route::get('/admins', 'AdminsController@adminsPage')->name('adminpage_path');
Route::get('/settings', 'AdminSettingsController@index');
Route::get('/settings/slider', 'AdminSettingsController@sliderPage');

Route::group(['namespace' => 'API'], function () {
    Route::get('category/api', 'CategoriesApiController@index');
    Route::get('category/api/all', 'CategoriesApiController@all');
    Route::get('category/api/count', 'CategoriesApiController@count');
    Route::post('category/api/new', 'CategoriesApiController@newCategory');
    Route::patch('category/api/update/{slug}', 'CategoriesApiController@categoryUpdate');
    Route::delete('category/api/delete/{category}', 'CategoriesApiController@deleteCategory');

    Route::get('service/api', 'ServicesApiController@index');
    Route::get('service/api/all', 'ServicesApiController@all');
    Route::get('service/api/count', 'ServicesApiController@count');
    Route::post('service/api/new', 'ServicesApiController@newServiceData');
    Route::patch('service/api/update/{slug}', 'ServicesApiController@serviceUpdate');
    Route::delete('service/api/delete/{slug}', 'ServicesApiController@deleteService');

    Route::get('sermon/api', 'SermonsApiController@index');
    Route::get('sermon/api/count', 'SermonsApiController@count');
    Route::get('sermon/api/service', 'ServicesApiController@fetchServices');
    Route::get('sermon/api/category', 'CategoriesApiController@fetchCategories');

    Route::post('sermon/api/upload', 'SermonsApiController@upload');
    Route::delete('sermon/api/delete/{sermon}', 'SermonsApiController@deleteSermon');
    Route::get('sermon/api/details/{slug}', 'SermonsApiController@getSermonDetails');
    Route::get('sermon/download/{slug}', 'SermonsApiController@downloadSermon');
    Route::get('sermon/api/sermoncategory/{slug}', 'SermonsApiController@sermonCategory');
    Route::get('sermon/api/sermonservice/{slug}', 'SermonsApiController@sermonService');
    Route::get('sermon/api/service/{service}', 'ServicesApiController@sermonServiceFilter');
    Route::get('sermon/api/category/{slug}', 'CategoriesApiController@sermonCategoryFilter');

    Route::get('stagedsermon/api', 'SermonsApiController@stagedsermon');
    Route::delete('stagedsermon/api/delete/{stagedsermon}', 'SermonsApiController@deleteStagedesermon');
    Route::get('stagedsermon/api/count', 'SermonsApiController@stagedsermonCount');

    Route::get('user/api/', 'UsersApiController@index');
    Route::get('user/api/count', 'UsersApiController@count');
    Route::post('user/api/new', 'UsersApiController@saveNewUser');
    Route::patch('user/api/password/change/{slug}', 'UsersApiController@changePassword');
    Route::delete('user/api/delete/{user}', 'UsersApiController@deleteUser');
    Route::get('user/api/type/{type}', 'UsersApiController@userTypeFilter');

    Route::get('admin/api', 'AdminsApiController@index');
    Route::get('admin/api/count', 'AdminsApiController@count');
    Route::patch('admin/api/update/{slug}', 'AdminsApiController@adminUpdate');
    Route::patch('admin/api/password/change/{slug}', 'AdminsApiController@changePassword');
    Route::delete('admin/api/delete/{slug}', 'AdminsApiController@deleteAdmin');
    Route::post('admin/api/new', 'AdminsApiController@saveNewAdmin');
    Route::get('admin/api/type/{type}', 'AdminsApiController@adminTypeFilter');
    Route::get('admin/api/current', 'AdminsApiController@currentAdmin');

    Route::get('/setting/api/slider', 'AdminSettingsApiController@getSliderImages');
    Route::post('setting/api/slider/upload', 'AdminSettingsApiController@sliderImageUpload');
    Route::post('setting/api/slider/remove', 'AdminSettingsApiController@deleteSliderImage');
    Route::get('setting/api', 'AdminSettingsApiController@index');
    Route::post('setting/applogo', 'AdminSettingsApiController@appLogo');
    Route::patch('setting/api/mail/update/{slug}', 'AdminSettingsApiController@updateWelcomeEmail');
    Route::patch('/setting/api/plan/{slug}', 'AdminSettingsApiController@saveStripePlan');
    Route::post('/setting/api/email', 'AdminSettingsApiController@saveContactEmail');
    Route::post('/setting/api/name', 'AdminSettingsApiController@saveChurchName');
    Route::get('setting/api/stripekey', 'AdminSettingsApiController@getStripeKey');
    Route::post('setting/api/key', 'AdminSettingsApiController@saveStripeKey');
    Route::get('setting/api/details', 'AdminSettingsApiController@details');
});
