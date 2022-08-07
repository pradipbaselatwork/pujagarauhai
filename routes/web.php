<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//add cart form front
Route::post('/add-to-cart', 'OrderController@addToCart')->name('add.to.cart');


// Route for front
Route::get('/', 'HomeController@index')->name('home');

//Route for tems and privacy
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');


//contact 
Route::post('/contact-us', 'ContactController@addContact')->name('add.contact');
Route::get('contact', 'contactController@contact')->name('contact');

//serviceContact 
Route::post('/service-contact-us', 'ServiceContactController@addServiceContact')->name('service.contact');
Route::get('service-contact', 'ServiceContactController@serviceContact')->name('serviceContact');

//nav of front
Route::get('/pages={url?}{id?}', 'HomeController@nav')->name('page');

//package detail front
Route::get('/package-detail{id}', 'PackageController@PackageDetail')->name('package.detail');

//service detail front
Route::get('/service-type{id}', 'ServiceController@ServiceType')->name('service.type');
Route::get('/service-detail{id}', 'ServiceController@ServiceDetail')->name('service.detail');
Route::get('/book-service{id}', 'ServiceController@bookService')->name('book.service');

//login /resgister for froendend
Route::match(['get','post'],'/login','UserController@login')->name('login');
Route::match(['get','post'],'/register','UserController@register')->name('register');


//Route for Order Placement/ Checkout
Route::match(['get','post'],'/checkout','OrderController@checkout')->name('checkout');

Route::get('/order-review','OrderController@orderreview')->name('order.review');

Route::match(['get','post'],'/placeorder','OrderController@placeorder')->name('placeorder');

Route::get('order-detail', 'OrderController@orderdetail')->name('orderdetail');
Route::get('see-order-detail{id}', 'OrderController@seeorderdetail')->name('seeorderdetail');

Route::group(['middleware'=>['auth']],function()
{
    
        //update user account details
        Route::match(['get','post'],'update-user-account','UserController@updateUserAccount')->name('update.user.account');
        //update user password
        Route::match(['get','post'],'update-user-password','UserController@updateUserPassword')->name('update.user.password');

        //front logout
        Route::get('logout','UserController@logout')->name('logout');

        //cart front
        Route::get('/cart', 'OrderController@cart')->name('cart');

        // //add cart form front
        // Route::post('/add-to-cart', 'OrderController@addToCart')->name('add.to.cart');

        //delete added cart route front
        Route::get('/delete-cart/{id?}', 'OrderController@deleteCart')->name('delete.cart');

});



Route::prefix('/admin')->namespace('Admin')->as('admin.')->group(function(){
   

    //all the admin route we are added  here :-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        // navbar 
        Route::get('navbar', 'NavbarController@Navbar')->name('navbar');
        Route::post('update-navbar-status', 'NavbarController@updateNavbarStatus')->name('update.navbar.status');
        Route::match(['get', 'post'], 'add-edit-navbar/{id?}', 'NavbarController@addEditNavbar')->name('add.edit.navbar');
        Route::get('delete-navbar/{id?}', 'NavbarController@deleteNavbar')->name('delete.navbar');

        // banner 
        Route::get('banner', 'BannerController@Banner')->name('banner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner')->name('add.edit.banner');
        Route::get('delete-banner-image/{id?}', 'BannerController@deleteBannerImage')->name('delete.banner.image');
        Route::get('delete-banner/{id?}', 'BannerController@deleteBanner')->name('delete.banner');

        // bannerimage
        Route::get('banner-image', 'BannerimageController@Bannerimage')->name('bannerimage');
        Route::match(['get', 'post'], 'add-edit-banner-image/{id?}', 'BannerimageController@addEditBannerimage')->name('add.edit.bannerimage');
        Route::get('delete-bannerimage/{id?}', 'BannerimageController@deleteBannerimage')->name('delete.bannerimage');

        // what is about here
        Route::match(['get','post'],'edit-what/{id?}', 'WhatController@editWhat')->name('edit.what');

        // package 
        Route::get('package', 'PackageController@Package')->name('package');
        Route::match(['get', 'post'], 'add-edit-package/{id?}', 'PackageController@addEditPackage')->name('add.edit.package');
        Route::get('delete-package-image/{id?}', 'PackageController@deletePackageImage')->name('delete.package.image');
        Route::get('delete-package/{id?}', 'PackageController@deletePackage')->name('delete.package');

           // packagetype 
           Route::get('packagetype', 'PackagetypeController@Packagetype')->name('packagetype');
           Route::match(['get', 'post'], 'add-edit-packagetype/{id?}', 'PackagetypeController@addEditPackagetype')->name('add.edit.packagetype');
           Route::get('delete-packagetype/{id?}', 'PackagetypeController@deletePackagetype')->name('delete.packagetype');

        // service 
        Route::get('service', 'ServiceController@Service')->name('service');
        Route::match(['get', 'post'], 'add-edit-service/{id?}', 'ServiceController@addEditService')->name('add.edit.service');
        Route::get('delete-service-image/{id?}', 'ServiceController@deleteServiceImage')->name('delete.service.image');
        Route::get('delete-service/{id?}', 'ServiceController@deleteService')->name('delete.service');

        // about us 
        Route::get('aboutUs', 'AboutUsController@aboutUs')->name('aboutUs');
        Route::match(['get', 'post'], 'add-edit-aboutUs/{id?}', 'AboutUsController@addEditAboutUs')->name('add.edit.aboutUs');
        Route::get('delete-aboutUs-image/{id?}', 'AboutUsController@deleteAboutUsImage')->name('delete.aboutUs.image');
        // Route::get('delete-test/{id?}', 'AboutUsController@deleteAboutUsImages',)->name('delete.aboutUs.images');
        Route::get('delete-aboutUs/{id?}', 'AboutUsController@deleteAboutUs')->name('delete.aboutUs');

          // footer
          Route::match(['get','post'],'edit-footer/{id?}', 'FooterController@editFooter')->name('edit.footer');

          //contact
          Route::get('contact', 'ContactController@contact')->name('contact');

          
          //serviceContact
          Route::get('booked-services', 'ServiceContactController@ServiceContact')->name('serviceContact');

        //showorder
        Route::get('showorder', 'OrderController@showorder')->name('showorder');
        Route::get('delete-order/{id?}', 'OrderController@deleteOrder')->name('delete.order');
        Route::get('see-order-detail{id}', 'OrderController@seeorderdetail')->name('see.order.detail');
      
        Route::post('update-order{id}', 'OrderController@updateorder')->name('updateorder');

        //see user rotue
        Route::get('users', 'UserController@users')->name('users');
        
    });
});


