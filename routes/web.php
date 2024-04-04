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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['level_admin','auth']], function(){
	
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'Home'])->name('admin.home')->middleware('level_admin');	
	
     Route::get('/user', [App\Http\Controllers\AdminController::class, 'userTampil'])->name('users.home')->middleware('level_admin');
     Route::get('/user/tambah', [App\Http\Controllers\AdminController::class, 'tambahUser'])->name('users.tambah')->middleware('level_admin');
     Route::post('/user/', [App\Http\Controllers\AdminController::class, 'prosestambahUser'])->name('users.prosesTambah')->middleware('level_admin');  
     Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edituser')->middleware('level_admin');
     Route::delete('/user/{id}', [App\Http\Controllers\AdminController::class, 'hapusUser'])->name('users.hapusUser')->middleware('level_admin');	
     Route::put('/user/{id}', [App\Http\Controllers\AdminController::class, 'prosesUpdateUser'])->name('users.prosesupdateuser')->middleware('level_admin'); 
     Route::get('/user/detail/{id}', [App\Http\Controllers\AdminController::class, 'detailuser'])->name('users.detailuser')->middleware('level_admin');	

     Route::get('/jabatan', [App\Http\Controllers\AdminController::class, 'tampiljabatan'])->name('jabatan.home')->middleware('level_admin');
     Route::get('/jabatan/tambah', [App\Http\Controllers\AdminController::class, 'tambahjabatan'])->name('jabatan.tambah')->middleware('level_admin');
     Route::post('/jabatan/', [App\Http\Controllers\AdminController::class, 'prosestambahjabatan'])->name('jabatan.prosesTambah')->middleware('level_admin');  
     Route::get('/jabatan/{id}', [App\Http\Controllers\AdminController::class, 'editjabatan'])->name('jabatan.edit')->middleware('level_admin');
     Route::delete('/jabatan/{id}', [App\Http\Controllers\AdminController::class, 'hapusjabatan'])->name('jabatan.hapus')->middleware('level_admin');	
     Route::put('/jabatan/{id}', [App\Http\Controllers\AdminController::class, 'prosesUpdatejabatan'])->name('jabatan.prosesupdatejabatan')->middleware('level_admin'); 	

     Route::get('/jenis_cuti', [App\Http\Controllers\AdminController::class, 'tampiljenis_cuti'])->name('jenis_cuti.home')->middleware('level_admin');
     Route::get('/jenis_cuti/tambah', [App\Http\Controllers\AdminController::class, 'tambahjenis_cuti'])->name('jenis_cuti.tambah')->middleware('level_admin');
     Route::post('/jenis_cuti/', [App\Http\Controllers\AdminController::class, 'prosestambahjenis_cuti'])->name('jenis_cuti.prosesTambah')->middleware('level_admin');  
     Route::get('/jenis_cuti/{id}', [App\Http\Controllers\AdminController::class, 'editjenis_cuti'])->name('jenis_cuti.edit')->middleware('level_admin');
     Route::delete('/jenis_cuti/{id}', [App\Http\Controllers\AdminController::class, 'hapusjenis_cuti'])->name('jenis_cuti.hapus')->middleware('level_admin');	
     Route::put('/jenis_cuti/{id}', [App\Http\Controllers\AdminController::class, 'prosesUpdatejenis_cuti'])->name('jenis_cuti.prosesupdatejenis_cuti')->middleware('level_admin');

    Route::get('/admincuti', [App\Http\Controllers\AdminController::class, 'tampilpegawai_cuti'])->name('admin_cuti.home')->middleware('level_admin'); 
    Route::get('/admincuti/{id}', [App\Http\Controllers\AdminController::class, 'detailpegawai'])->name('admin_cuti.detail')->middleware('level_admin');  	 
	    Route::get('/cetaksk/{id}', [App\Http\Controllers\AdminController::class, 'cetaksk'])->name('admin.cetaksk')->middleware('level_admin');	
}); 

Route::group(['prefix' => 'pimpinan', 'middleware' => ['level_pimpinan','auth']], function(){
	
//	Route::get('/home', [App\Http\Controllers\PegawaiController::class, 'Home'])->name('pegawai.home')->middleware('level_pegawai');
	
	Route::get('/home', [App\Http\Controllers\PimpinanController::class, 'Home'])->name('pimpinan.home')->middleware('level_pimpinan');
    Route::put('/updateuser/{id}', [App\Http\Controllers\PimpinanController::class, 'updateprofil'])->name('pimpinan.updateprofil')->middleware('level_pimpinan'); 
    Route::get('/pimpinan_cuti', [App\Http\Controllers\PimpinanController::class, 'tampilpegawai_cuti'])->name('pimpinan_cuti.home')->middleware('level_pimpinan');  
    Route::get('/pimpinan_cuti/{id}', [App\Http\Controllers\PimpinanController::class, 'detailpegawai'])->name('pimpinan_cuti.detail')->middleware('level_pimpinan');
    Route::put('/pimpinan/teruskan/{id}', [App\Http\Controllers\PimpinanController::class, 'prosesteruskan'])->name('pimpinan.teruskancuti')->middleware('level_pimpinan');

	
}); 

Route::group(['prefix' => 'sekretaris', 'middleware' => ['level_sekretaris','auth']], function(){
	
	
	Route::get('/home', [App\Http\Controllers\SekretarisController::class, 'Home'])->name('sekretaris.home')->middleware('level_sekretaris');
    Route::put('/updateuser/{id}', [App\Http\Controllers\SekretarisController::class, 'updateprofil'])->name('sekretaris.updateprofil')->middleware('level_sekretaris'); 
    Route::get('/sekre_cuti', [App\Http\Controllers\SekretarisController::class, 'tampilpegawai_cuti'])->name('sekretaris_cuti.home')->middleware('level_sekretaris');  
    Route::get('/sekre_cuti/{id}', [App\Http\Controllers\SekretarisController::class, 'detailpegawai'])->name('sekretaris_cuti.detail')->middleware('level_sekretaris');
    Route::put('/sekre/teruskan/{id}', [App\Http\Controllers\SekretarisController::class, 'prosesteruskan'])->name('sekretaris.teruskancuti')->middleware('level_sekretaris');
	
}); 

Route::group(['prefix' => 'pegawai', 'middleware' => ['level_pegawai','auth']], function(){
	
	Route::get('/home', [App\Http\Controllers\PegawaiController::class, 'Home'])->name('pegawai.home')->middleware('level_pegawai');
    Route::put('/updateuser/{id}', [App\Http\Controllers\PegawaiController::class, 'updateprofil'])->name('pegawai.updateprofil')->middleware('level_pegawai'); 	

    Route::get('/pegawai_cuti', [App\Http\Controllers\PegawaiController::class, 'tampilpegawai_cuti'])->name('pegawai_cuti.home')->middleware('level_pegawai');
    Route::get('/pegawai_cuti/tambah', [App\Http\Controllers\PegawaiController::class, 'tambahpegawai_cuti'])->name('pegawai_cuti.tambah')->middleware('level_pegawai');
    Route::post('/pegawai_cuti/', [App\Http\Controllers\PegawaiController::class, 'prosestambahcuti'])->name('pegawai_jeniscuti.prosesTambah')->middleware('level_pegawai');  
    Route::get('/pegawai_cuti/{id}', [App\Http\Controllers\PegawaiController::class, 'detailpegawai'])->name('pegawai_cuti.detail')->middleware('level_pegawai');
// Route::delete('/pegawai_cuti/{id}', [App\Http\Controllers\PegawaiController::class, 'hapuspegawai_cuti'])->name('pegawai_cuti.hapus')->middleware('level_pegawai');	
    Route::get('/cetak/{id}', [App\Http\Controllers\PegawaiController::class, 'cetaksk'])->name('pegawai_cuti.cetaksk')->middleware('level_pegawai');	
	
}); 