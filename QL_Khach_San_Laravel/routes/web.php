<?php

use Illuminate\Support\Facades\Route;

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
Route::get('test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('user.index');
});
Route::get('Home', function () {
    return view('user.index');
});

Route::get('manager', function () {
    return view('backend.index');
});
//phong


//admin.


 Route::get('admin', 'AdminController@index')->name('admin');

 //booking  backend khach khong dat phong
 Route::get('admin/{id}/create', 'Backend\HoadonController@create')->name('admin.create');
Route::post('admin/store', 'Backend\HoadonController@store')->name('admin.store');
Route::get('admin/{id}/edit', 'Backend\HoadonController@edit')->name('admin.edit');
Route::get('admin/{id}/show', 'Backend\HoadonController@show')->name('admin.show');
Route::get('admin/{id}/update', 'Backend\HoadonController@update')->name('admin.update');
Route::get('admin/{id}/delete', 'Backend\HoadonController@destroy')->name('admin.destroy');
Route::post('admin/pay', 'Backend\HoadonController@pay')->name('admin.pay');
//loại phòng
Route::resource('/backend/loaiphong', 'Backend\LoaiPhongController');
//phong
Route::get('/backend/phong/pdf', 'Backend\PhongController@pdf')->name('phong.pdf');
Route::get('/backend/phong/print', 'Backend\PhongController@print')->name('phong.print');
Route::resource('/backend/phong', 'Backend\PhongController');

//xac thuc tai khoang
Auth::routes();

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});



Route::get('/home', 'HomeController@index')->name('home');


//frontend
//khachhang
Route::resource('/user', 'Frontend\UserController');

//booking backend khach dat phong
Route::get('/Backend/booking', 'Frontend\BookingController@index')->name('backend.booking.index');
Route::post('/Backend/booking/update', 'Frontend\BookingController@update')->name('backend.booking.update');
Route::post('/Backend/booking/edit', 'Frontend\BookingController@edit')->name('backend.booking.edit');
Route::get('/Backend/booking/{id}/checkin', 'Frontend\BookingController@checkin')->name('backend.booking.checkin');

//booking user
Route::get('orders', 'ExampleController@index')->name('orders');
Route::get('orders/{id}/create', 'ExampleController@create')->name('orders.create');
Route::post('orders/store', 'ExampleController@store')->name('orders.store');
Route::post('orders/{id}/uptate', 'ExampleController@update')->name('orders.update');

// admin manager

Route::group(['prefix' => 'manager', 'as' => 'manager.', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    // khachhang
    Route::resource('khachhang', 'KhachhangController');
    // Room Types
    Route::delete('room-types/destroy', 'RoomTypesController@massDestroy')->name('room-types.massDestroy');
    Route::resource('room-types', 'RoomTypesController');
    // Rooms
    Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy');
    Route::resource('rooms', 'RoomsController');
    // Bookings
    Route::delete('bookings/destroy', 'BookingsController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingsController');
});
