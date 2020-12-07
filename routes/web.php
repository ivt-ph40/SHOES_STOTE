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

// Route::get('/', function () {
//     return view('welcome');
// });


//Show homepage

//Show product's detail
Route::get('/product/{id}', 'ProductController@show')->name('product-detail');

//Show form contact us
Route::get('/contact-us', 'ContactController@showContactForm')->name('contact-form');

//Submit contact
Route::post('/contact-us', 'ContactController@sendMail')->name('send-contact');

//Show cart
Route::get('/cart', function(){
    return view('users.cart');
})->name('show-cart');

//Add cart
Route::get('/add-cart/{id}', 'ProductController@addToCart')->name('add-cart');

//Show list of products
Route::get('/product-list', function(){
    return view('users.product-listing');
})->name('product-list');

//Show order detail
Route::get('/checkout', function(){
    return view('users.checkout');
})->name('checkout');

//Show favorite product list
Route::get('/wishlist', function(){
    return view('users.wishlist');
})->name('wishlist');

//Compare products
Route::get('/compare', function(){
    return view('users.compare');
})->name('compare');

//Show company info
Route::get('/company', function(){
    return view('users.about');
})->name('company-info');

//Show 404 page
Route::get('/404', function(){
    return view('users.404');
})->name('notfound');

//Show profile
Route::get('/profile', function(){
    return view('users.profile');
})->name('profile');



//Admin 
Route::get('/admins', function(){
    return view('admins.home');
})->name('home.admins');

//Admin category
Route::get('/categories', 'CategoryController@index')->name('categories.list');
//Admin create Category
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
//Admin store Category
Route::post('/categories', 'CategoryController@store')->name('categories.store');
//Admin Delete Category 
Route::Delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
//Admin Show edit form Category
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');

//Admin update Category
Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');


//Admin brand
Route::get('/brands', 'BrandController@index')->name('brands.list');
//Admin create brand
Route::get('/brands/create', 'BrandController@create')->name('brands.create');
//Admin store brand
Route::post('/brands', 'BrandController@store')->name('brands.store');
//Admin Delete brands 
Route::Delete('/brands/{id}', 'BrandController@destroy')->name('brands.destroy');
//Admin Show edit form Category
Route::get('/brands/{id}/edit', 'BrandController@edit')->name('brands.edit');

//Admin update brand
Route::put('/brands/{id}', 'BrandController@update')->name('brands.update');

//Admin product
Route::get('/products', 'ProductAdminController@index')->name('products.list');

//Admin select product
Route::post('/products', 'ProductAdminController@select')->name('products.select');
//Admin create product
Route::get('/products/create', 'ProductAdminController@create')->name('products.create');
//Admin store brand
Route::post('/products/create', 'ProductAdminController@store')->name('products.store');
//Admin Show edit form Product
Route::get('/products/{code}/edit', 'ProductAdminController@edit')->name('products.edit');
//Admin update Product
Route::put('/products/{id}', 'ProductAdminController@update')->name('products.update');




//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Gen ra các route cho authern
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

//Show login form
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('form-login');

//Submit login
Route::post('/login', 'Auth\LoginController@login')->name('login');

//Show homepage
Route::get('/home', 'HomeController@index')->name('home');

//Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Register form
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('form-register');

//Create user
Route::post('/register', 'Auth\RegisterController@register')->name('register');


