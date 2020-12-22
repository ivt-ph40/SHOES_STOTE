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

//Start route user

//Show homepage
Route::get('/', 'HomeController@index')->name('home');

//Search product
Route::get('/search-product', 'ProductController@showSearchedList')->name('search-product');

//Show empty product listing
Route::get('/product-listing', 'ProductController@showList')->name('show-empty-list');

//Show product's detail
Route::get('/product/{id}', 'ProductController@show')->name('product-detail');

//Store review
Route::post('/review', 'ReviewController@store')->name('submit-review');

//Show form contact us
Route::get('/contact-us', 'ContactController@showContactForm')->name('contact-form');

//Submit contact
Route::post('/contact-us', 'ContactController@sendMail')->name('send-contact');

//Show cart
Route::get('/cart', 'CartController@showCart')->name('show-cart');
Route::post('/cart/update/quantity', 'CartController@updateQuantity')->name('cart.update.quantity');

//Add to cart
Route::post('/cart', 'CartController@addCart')->name('add-cart');

//Show order info
Route::get('/checkout', 'OrderController@showOrderInfo')->name('checkout');

//Submit order
Route::post('/place-order','OrderController@submitOrder')->name('submit-order');

//Remove cart
Route::get('/cart_remove', 'CartController@cart_remove')->name('cart_remove');

//Show new releases for men
Route::get('/new_releases_men', 'ProductController@showMenNewReleases')->name('new-releases-men');

//Show new releases for women
Route::get('/new_releases_women', 'ProductController@showWomenNewReleases')->name('new-releases-women');

//Show sale shoes for men
Route::get('/sale_shoes_men', 'ProductController@showMenSaleShoes')->name('sale-shoes-men');

//Show sale shoes for women
Route::get('/sale_shoes_women', 'ProductController@showWomenSaleShoes')->name('sale-shoes-women');

//Show all men shoes
Route::get('/all-men-shoes', 'ProductController@showAllMenShoes')->name('all-men-shoes-list');

//Show lifestyle shoes of men
Route::get('/lifestyle-men-shoes', 'ProductController@showLifestyleMenShoes')->name('lifestyle-men-shoes-list');

//Show running shoes of men
Route::get('/running-men-shoes', 'ProductController@showRunningMenShoes')->name('running-men-shoes-list');

//Show training shoes of men
Route::get('/training-men-shoes', 'ProductController@showTrainingMenShoes')->name('training-men-shoes-list');

//Show football shoes of men
Route::get('/football-men-shoes', 'ProductController@showFootballMenShoes')->name('football-men-shoes-list');

//Show Nike's men shoes
Route::get('/Nike-men-shoes', 'ProductController@showNikeMenShoes')->name('Nike-men-shoes-list');

//Show Adidas's men shoes
Route::get('/Adidas-men-shoes', 'ProductController@showAdidasMenShoes')->name('Adidas-men-shoes-list');

//Show all women shoes
Route::get('/all-women-shoes', 'ProductController@showAllWomenShoes')->name('all-women-shoes-list');

//Show lifestyle shoes of women
Route::get('/lifestyle-women-shoes', 'ProductController@showLifestyleWomenShoes')->name('lifestyle-women-shoes-list');

//Show running shoes of women
Route::get('/running-women-shoes', 'ProductController@showRunningWomenShoes')->name('running-women-shoes-list');

//Show training shoes of women
Route::get('/training-women-shoes', 'ProductController@showTrainingWomenShoes')->name('training-women-shoes-list');

//Show football shoes of women
Route::get('/football-women-shoes', 'ProductController@showFootballWomenShoes')->name('football-women-shoes-list');

//Show Nike's women shoes
Route::get('/Nike-women-shoes', 'ProductController@showNikeWomenShoes')->name('Nike-women-shoes-list');

//Show Adidas's women shoes
Route::get('/Adidas-women-shoes', 'ProductController@showAdidasWomenShoes')->name('Adidas-women-shoes-list');

//Show profile
Route::get('/profile/{userID}/edit', 'HomeController@showProfile')->name('show-profile');

//Update profile
Route::put('/profile/{userID}', 'HomeController@updateProfile')->name('update-profile');

//Show 404 page
Route::get('/404', function(){
    return view('users.404');
})->name('notfound');

//End root user



//Admin
Route::get('/admins/{name}', 'AdminController@index')->name('home.admins');

//Admin category
Route::get('/categories/{name}', 'CategoryController@index')->name('categories.list');
//Admin create Category
Route::get('/categories/create/{name}', 'CategoryController@create')->name('categories.create');
//Admin store Category
Route::post('/categories/{name}', 'CategoryController@store')->name('categories.store');
//Admin Show edit form Category
Route::get('/categories/{id}/{name}/edit', 'CategoryController@edit')->name('categories.edit');
//Admin update Category
Route::put('/categories/{id}/{name}', 'CategoryController@update')->name('categories.update');
//Admin Delete Category
Route::Delete('/categories/{id}/{name}', 'CategoryController@destroy')->name('categories.destroy');
//Admin category record
Route::get('/categories/record/{name}', 'CategoryController@showRecord')->name('categories.record');
//Admin Delete Category record
Route::Delete('/categories/record/{id}/{name}', 'CategoryController@force')->name('categories.force');
//Admin update Category record
Route::put('/categories/record/{id}/{name}', 'CategoryController@restore')->name('categories.restore');



//Admin brand
Route::get('/brands/{name}', 'BrandController@index')->name('brands.list');
//Admin create brand
Route::get('/brands/create/{name}', 'BrandController@create')->name('brands.create');
//Admin store brand
Route::post('/brands/{name}', 'BrandController@store')->name('brands.store');
//Admin Delete brands
Route::Delete('/brands/{id}/{name}', 'BrandController@destroy')->name('brands.destroy');
//Admin Show edit form Category
Route::get('/brands/{id}/{name}/edit', 'BrandController@edit')->name('brands.edit');
//Admin update brand
Route::put('/brands/{id}/{name}', 'BrandController@update')->name('brands.update');
//Admin brand record
Route::get('/brands/record/{name}', 'BrandController@showRecord')->name('brands.record');
//Admin Delete brand record
Route::Delete('/brands/record/{id}/{name}', 'BrandController@force')->name('brands.force');
//Admin update brand record
Route::put('/brands/record/{id}/{name}', 'BrandController@restore')->name('brands.restore');



//Admin product
Route::get('/products/{name}', 'ProductAdminController@index')->name('products.list');
//Admin select product
Route::post('/products/{name}', 'ProductAdminController@select')->name('products.select');
//Admin create product
Route::get('/products/create/{name}', 'ProductAdminController@create')->name('products.create');
//Admin store product
Route::post('/products/create/{name}', 'ProductAdminController@store')->name('products.store');
//Admin Show edit form Product
Route::get('/products/{code}/{name}/edit', 'ProductAdminController@edit')->name('products.edit');
//Admin update Product
Route::put('/products/{id}/{name}', 'ProductAdminController@update')->name('products.update');
//Admin Delete Product
Route::Delete('/products/{id}/{name}', 'ProductAdminController@destroy')->name('products.destroy');
//Admin Product record
Route::get('/products/record/{name}', 'ProductAdminController@showRecord')->name('products.record');
//Admin Delete Product record
Route::Delete('/products/record/{code}/{name}', 'ProductAdminController@force')->name('products.force');
//Admin update Product record
Route::put('/products/record/{code}/{name}', 'ProductAdminController@restore')->name('products.restore');


//Admin productDetail
Route::get('/productDetail/{code}/{name}', 'ProductAdminDetailController@index')->name('productdetail.list');
//Admin create productDetail
Route::get('/productDetail/{id}/{name}/create', 'ProductAdminDetailController@create')->name('productdetail.create');
//Admin store productDetail
Route::post('/productDetail/create/{name}', 'ProductAdminDetailController@store')->name('productdetail.store');
//Admin Show edit form productDetail
Route::get('/productDetail/{id}/{product_id}/{name}/edit', 'ProductAdminDetailController@edit')->name('productdetail.edit');
//Admin update productDetail
Route::put('/productDetail/{id}/{name}', 'ProductAdminDetailController@update')->name('productdetail.update');
//Admin Delete productDetail
Route::Delete('/productDetail/{id}/{productID}/{name}', 'ProductAdminDetailController@destroy')->name('productdetail.destroy');
//Admin productDetail record
Route::get('/productDetail/record/{code}/{name}', 'ProductAdminDetailController@showRecord')->name('productdetail.record');
//Admin Delete productDetail record
Route::Delete('/productDetail/record/{code}/{name}', 'ProductAdminDetailController@force')->name('productdetail.force');
//Admin update productDetail record
Route::put('/productDetail/record/{name}', 'ProductAdminDetailController@restore')->name('productdetail.restore');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Gen ra các route cho authern
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Show login form
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form-login');

//Submit login
Route::post('/login', 'Auth\LoginController@login')->name('login');

// //Show homepage
// Route::get('/home', 'HomeController@index')->name('home');

//Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//Register form
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('form-register');

//Create user
Route::post('/register', 'Auth\RegisterController@register')->name('register');


