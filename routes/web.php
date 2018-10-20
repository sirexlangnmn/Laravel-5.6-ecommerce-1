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

/* ---------------------------
	For Client Side
--------------------------- */ 


Auth::routes();

// This is default index. I disabled to create my own index page
/* Route::get('/', function () {
    return view('welcome');
}); */

// default path in Laravel once successfully login. 
/* Route::get('/home', 'HomeController@index')->name('home'); */


// index/home page
Route::get('/', 'IndexController@index')
	->name('index');

// all products
Route::get('/all-products', 'IndexController@allProducts')
	->name('allProducts_route');

// category/listing page
Route::get('/products/{url}', 'ProductsController@products')
	->name('product_listing_route');

// product detail page
Route::get('/product-details/{url}', 'ProductsController@productDetails')
	->name('product_details_route');

// get product attribute price
Route::get('/get-product-price', 'ProductsController@getProductPrice');

// add to cart
Route::post('cart/add-to-cart', 'CartsController@addToCart')
	->name('addToCart_route');

// cart
Route::get('/cart', 'CartsController@cart')
	->name('cart_route');	

// delete/destroy product in cart
Route::get('/cart/delete-product/{cart_id}', 'CartsController@destroy')
	->name('destroyProductInCart_route');

// update quantity
Route::get('/cart/update-product-quantity/{cart_id}/{quantity}', 'CartsController@updateQuantity');			

// apply coupon
Route::post('cart/apply-coupon', 'CouponsController@applyCoupon')
	->name('applyCoupon_route');

// contact us
Route::get('/contact-us', 'IndexController@contactUs' )->name('contactUs_route');

// user login-register page
Route::get('/login-register', 'UsersController@index')->name('login_register_route');

// user register
Route::post('/register', 'UsersController@register')->name('register_route');

// check user email if already exists
Route::match(['post','get'],'/check-email','UsersController@checkEmail');


/* ---------------------------
	For Admin Side
--------------------------- */ 
/*
|--------------------------------------------------------------------------
| Note
|--------------------------------------------------------------------------
| 1. Go to app\Http\Middleware\RedrectIfAuthenticated.php and config the file.
| 	Include your route inside Route::group 
|	so no one can access it directly without login
| 
| 2. URL will be stay as is. But you can name the route to use it on href.
|
| 3. Route::get('/admin/check-pwd', 'AdministratorsController@check_password');
|	 I make some config in matrix.form_validation.js and to the input box in settings.blade.php
|
| 4. "intervention/image": "^2.4", install this repo/package. For resizing images.
|
|
*/

Route::match(['get','post'], '/admin/admin-login-page', 'AdministratorsController@login')
	->name('login_route');

Route::get('/admin/logout', 'AdministratorsController@logout')
	->name('logout_route');



/* Can't access without proper login */
Route::group(['middleware' => ['auth']], function(){
	Route::get('/admin/dashboard', 'AdministratorsController@dashboard')
		->name('dashboard_route');

	Route::get('/admin/settings', 'AdministratorsController@settings')
		->name('settings_route');
	
	/*I guess @checkPassword is not need*/
	Route::get('/admin/check-password', 'AdministratorsController@checkPassword');
	
	Route::match(['get','post'], '/admin/update-password', 'AdministratorsController@updatePassword')
		->name('update_password_route');


	/*Category CRUD Route*/
	Route::get('/admin/create-category', 'CategoriesController@create')
		->name('create_category_route');	
	
	Route::get('/admin/index-category', 'CategoriesController@index')
		->name('index_category_route');
	
	Route::post('/admin/store-category', 'CategoriesController@store')
		->name('store_category_route');
	
	Route::get('/admin/show-category/{category_id}', 'CategoriesController@show')
		->name('show_category_route');
	
	Route::get('/admin/edit-category/{category_id}', 'CategoriesController@edit')
		->name('edit_category_route');
	
	Route::post('/admin/update-category/{category_id}', 'CategoriesController@update')
		->name('update_category_route');
	
	Route::get('/admin/delete-category-confirmation/{category_id}', 'CategoriesController@show')
		->name('delete_category_confirmation_route');
	
	Route::get('/admin/destroy-category/{category_id}', 'CategoriesController@destroy')
		->name('destroy_category_route');


	/*Product CRUD Route*/
	Route::get('/admin/create-product', 'ProductsController@create')
		->name('create_product_route');	
	
	Route::get('/admin/index-product', 'ProductsController@index')
		->name('index_product_route');
	
	Route::post('/admin/store-product', 'ProductsController@store')
		->name('store_product_route');
	
	/* Route function show taken care by route function index using modal */
	
	Route::get('/admin/edit-product/{product_id}', 'ProductsController@edit')
	->name('edit_product_route');
	
	Route::post('/admin/update-product/{product_id}', 'ProductsController@update')
	->name('update_product_route');
	
	Route::get('/admin/delete-product-confirmation/{product_id}', 'ProductsController@show')
	->name('delete_product_confirmation_route');
	
	Route::get('/admin/destroy-product-image/{product_id}', 'ProductsController@destroyProductImage')
	->name('destroy_product_image_route');
	
	Route::get('/admin/delete-product/{product_id}', 'ProductsController@destroy')
	->name('destroy_product_route');


	// For Product Attributes.
	Route::get('/admin/index-product-attributes/{product_id}', 
		'ProductAttributesController@index')
	->name('index_product_attributes_route');

	Route::post('/admin/store-product-attributes/{product_id}', 
	 	'ProductAttributesController@store')
		->name('store_product_attributes_route');

	Route::get('/admin/edit-product-attributes/{product_id}', 
		'ProductAttributesController@edit')
		->name('edit_product_attributes_route');

	Route::post('/admin/update-product-attributes/{product_id}', 
		'ProductAttributesController@update')
		->name('update_product_attributes_route');

	Route::get('/admin/destroy-product-attributes/{prod_attrib_id}', 
		'ProductAttributesController@destroy')
		->name('destroy_prod_attrib_route');


	// additional product images
	Route::get('/admin/index-product-alternate-images/{product_id}', 
		'ProductImagesController@index')
		->name('index_product_images_route');

	Route::post('/admin/store-product-alternate-images/{product_id}', 
		'ProductImagesController@store')
		->name('store_product_images_route');

	Route::get('/admin/destroy-product-alternate-image/{prod_image_id}', 
		'ProductImagesController@destroy')
		->name('destroy_prod_alternate_image_route');



	/*Coupons CRUD Route*/
	Route::get('/admin/create-coupons', 'CouponsController@create')
		->name('createCoupons_route');	
	
	Route::get('/admin/index-coupons', 'CouponsController@index')
		->name('indexCoupons_route');

	Route::post('/admin/store-coupons', 'CouponsController@store')
		->name('storeCoupons_route');
	
	Route::get('/admin/show-coupons/{coupon_id}', 'CouponsController@show')
		->name('showCoupons_route');
	
	Route::get('/admin/edit-coupons/{coupon_id}', 'CouponsController@edit')
		->name('editCoupons_route');
	
	Route::post('/admin/update-coupons/{coupon_id}', 'CouponsController@update')
		->name('updateCoupons_route');
	
	Route::get('/admin/delete-coupons-confirmation/{coupon_id}', 'CouponsController@show')
		->name('deleteCouponsConfirmation_route');
	
	Route::get('/admin/destroy-coupons/{coupon_id}', 'CouponsController@destroy')
		->name('destroyCoupons_route');	



	/*Banners CRUD Route*/
	Route::get('/admin/create-banners', 'BannersController@create')
		->name('createBanners_route');	
	
	Route::get('/admin/index-banners', 'BannersController@index')
		->name('indexBanners_route');

	Route::post('/admin/store-banners', 'BannersController@store')
		->name('storeBanners_route');
	
	Route::get('/admin/show-banners/{banner_id}', 'BannersController@show')
		->name('showBanners_route');
	
	Route::get('/admin/edit-banners/{banner_id}', 'BannersController@edit')
		->name('editBanners_route');
	
	Route::post('/admin/update-banners/{banner_id}', 'BannersController@update')
		->name('updateBanners_route');
	
	Route::get('/admin/delete-banners-confirmation/{banner_id}', 'BannersController@show')
		->name('deleteBannersConfirmation_route');
	
	Route::get('/admin/destroy-banners/{banner_id}', 'BannersController@destroy')
		->name('destroyBanners_route');	

	Route::get('/admin/destroy-banner-image/{banner_id}', 'BannersController@destroyBannerImage')
	->name('destroyBannersImage_route');









});








