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
Route::get('/', 'HomeController@index')->name('home');

//Search product
Route::post('/search-product', 'ProductController@search')->name('search-product');

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

// //Show homepage
// Route::get('/home', 'HomeController@index')->name('home');

//Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//Register form
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('form-register');

//Create user
Route::post('/register', 'Auth\RegisterController@register')->name('register');


