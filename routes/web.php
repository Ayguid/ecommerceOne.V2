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
// Route::get('/', 'WelcomeController@index');



//version vieja
// //home guest pages
// Route::get('/', 'DisplayController@index');
// Route::get('/cart/{request?}', 'DisplayController@showCart')->name('refresh');
// Route::post('/cart', 'DisplayController@showCart')->name('addToCart');
//
//
//
// //parte sucia siguientes 5 lineas arreglar
// Route::get('/orders', 'DisplayController@showOrders')->name('showOrders');
// Route::get('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');
// Route::get('/shipping', 'Shipping_Method_Controller@showShippingMethods')->name('shipping');
// Route::post('/shipping', 'Shipping_Method_Controller@saveAddress')->name('saveAddress');
// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');
//
//
//
//
// //
// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/category/{category}', 'DisplayController@filterByCategory')->name('filterByCategory');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');
// //creates auth routes for users
// Auth::routes();
//
// //user logged in
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');



/////////



// view helper rouutes
Route::get('/', 'ViewHelperController@index');
Route::get('/category/{category?}', 'ViewHelperController@index')->name('indexProducts');
Route::get('/product/{id}', 'ViewHelperController@index')->name('showProduct');

//cart stuff controller
Route::get('/cart', 'CartController@showCart')->name('showCart');
Route::post('/cart', 'CartController@cart')->name('addToCart');






// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');

// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');
// Route::post('/cart', 'DisplayController@showCart')->name('addToCart');
// Route::get('/cart/{request?}', 'DisplayController@showCart')->name('refresh');




// Route::get('/orders', 'DisplayController@showOrders')->name('showOrders');
// Route::get('/saveOrder', 'User_Order_Controller@cartToOrder')->name('cartToOrder');
// Route::get('/shipping', 'Shipping_Method_Controller@showShippingMethods')->name('shipping');
// Route::post('/shipping', 'Shipping_Method_Controller@saveAddress')->name('saveAddress');
// Route::get('/checkout', 'DisplayController@checkout')->name('checkout');




//
// Route::get('/products', 'DisplayController@index')->name('productListing');
// Route::get('/products/category/{category}', 'DisplayController@filterByCategory')->name('filterByCategory');
// Route::get('/products/product/{product}', 'DisplayController@showProduct')->name('showProduct');









//creates auth routes for users
Auth::routes();
//user logged in
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');



//admin prefix
Route::prefix('admin')->group(function()
{
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');



  //  Password reset Route
  Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


  //add admin Controller show stuff only
  Route::get('addProducts', 'AdminController@showAddProductsForm')->name('admin.addProducts');
  Route::get('editProduct/{id?}', 'AdminController@showEditProductsForm')->name('admin.editProduct');
  Route::get('addCategories', 'AdminController@showAddCategoriesForm')->name('admin.addCategories');
  Route::get('addBrands', 'AdminController@showAddBrandsForm')->name('admin.addBrands');


  //individual objects controllers save updates and stuff
  Route::post('addProducts/{token?}', 'ProductController@saveProduct')->name('admin.addedProduct');
  Route::post('editProducts/{id}', 'ProductController@update')->name('admin.updateProduct');
  Route::post('addCategories/{token?}', 'Ref_Product_Category_Controller@saveCategory')->name('admin.saveCategory');
  Route::post('addBrand/{token?}', 'Ref_Product_Brand_Controller@saveBrand')->name('admin.saveBrand');
});
