<?php

use App\Http\Controllers\HoadonController;
use App\Http\Controllers\LoaiSanPhamController;
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
//oute::get('/', 'LoaiSanPhamController@index');
Route::get('/','HomeControllers@index')-> name('home.index');
Route::get('/sanpham','HomeControllers@category')->name('home.cate');
Route::get('/sanpham/{id}','HomeControllers@details')->name('home.des');
// Route::get('/sanpham?key={id}','HomeControllers@find')->name('home.find');

Route::group(['prefix'=>'admin', 'middleware'=>'checkAdmin'], function(){
    Route::get('/', 'AdminControllers@index')->name('admin.index');
    Route::get('/thongke', 'AdminControllers@thongke')->name('admin.thongke');
    Route::post('/thongke/loc','Admincontrollers@loc')->name('thongke.loc');
    Route::get('/thongke/dt','Admincontrollers@dt_Tuan')->name('thongke.sort');
    Route::resources([
        'dasboard'=>'AdminControllers',
        'sanpham'=> 'SanphamController',
        'loaisanpham'=> 'LoaiSanPhamController',
        'khachhang' => 'KhachHangController',
        'hoadon' => 'HoadonController',
        'kho' => 'KhoController',
        'khachhang'=> 'KhachHangController',
        'nhanvien'=> 'NhanVienController',
        'nhacungcap'=> 'NhaCungCapController',
        'taikhoan'=> 'TaikhoanController',
    ]);
});
Route::get('/loginAdmin', 'AdminControllers@showLogin')-> name('admin.showLogin')->middleware('checkLogin');
Route::post('/loginAdmin', 'AdminControllers@chekLogin')-> name('admin.login');
Route::get('/logoutAdmin','AdminControllers@logout')->name('admin.logout');
Route::get('/login','AccountCus@login')->name('home.login');
Route::post('/login','AccountCus@checklogin')->name('home.checklogin');
Route::get('/logout','AccountCus@logout')->name('home.logout');
Route::get('/register','AccountCus@register')->name('home.register');
Route::post('/register','AccountCus@addRegister')->name('home.addregister');
Route::get('/cart', 'HomeControllers@cart')->name('home.cart');
Route::post('/cart', 'HomeControllers@addCart')->name('home.addCart');
Route::get('/cart/{id}', 'HomeControllers@delCart')->name('home.delCart');
Route::post('/updateCart', 'HomeControllers@updateCart')->name('home.updateCart');
Route::get('/payment', 'HomeControllers@showpayment')->name('home.payment')->middleware('checkCus');
Route::post('/payment','HomeControllers@addBill')->name('home.addBill');
Route::get('/mybills', 'HomeControllers@myBills')->name('home.myBills');
Route::get('/mybills/{id}', 'HomeControllers@myDetails')->name('home.myDetails');
Route::get('/cancleBill/{id}', 'HomeControllers@cancleBill')->name('home.cancleBill');
Route::get('/doneBill/{id}', 'HomeControllers@doneBill')->name('home.doneBill');
Route::get('/myprofile','AccountCus@profile')->name('home.profile');
Route::post('/myprofile','AccountCus@edit')->name('home.edit');
Route::post('/myprofile/editPass','AccountCus@editPass')->name('home.editPass');