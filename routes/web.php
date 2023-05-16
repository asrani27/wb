<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
    // if (Auth::check()) {
    //     if (Auth::user()->hasRole('superadmin')) {
    //         return redirect('superadmin');
    //     } elseif (Auth::user()->hasRole('pemohon')) {
    //         return redirect('user');
    //     }
    // }
    // return redirect('/wb');
});

//Route::post('sendwb', [HomeController::class, 'wb']);
Route::post('sendwb', [MailController::class, 'index']);
// Route::get('login', [LoginController::class, 'index'])->name('login');
// Route::get('wb', [HomeController::class, 'wb']);
// Route::post('login', [LoginController::class, 'login']);
// Route::get('daftar', [DaftarController::class, 'index']);
// Route::post('daftar', [DaftarController::class, 'daftar']);
// Route::get('lupa-password', [LupaPasswordController::class, 'index']);
// Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
// Route::get('/logout', [LogoutController::class, 'logout']);


// Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
//     Route::get('superadmin', [HomeController::class, 'superadmin']);
//     Route::get('superadmin/gp', [GantiPasswordController::class, 'index']);
//     Route::post('superadmin/gp', [GantiPasswordController::class, 'update']);
//     Route::post('superadmin/sk/updatelurah', [HomeController::class, 'updatelurah']);

//     Route::get('superadmin/user', [AdminController::class, 'user']);
//     Route::get('superadmin/user/create', [AdminController::class, 'user_create']);
//     Route::post('superadmin/user/create', [AdminController::class, 'user_store']);
//     Route::get('superadmin/user/edit/{id}', [AdminController::class, 'user_edit']);
//     Route::post('superadmin/user/edit/{id}', [AdminController::class, 'user_update']);
//     Route::get('superadmin/user/delete/{id}', [AdminController::class, 'user_delete']);

//     Route::get('superadmin/kecamatan', [AdminController::class, 'kecamatan']);
//     Route::get('superadmin/kecamatan/create', [AdminController::class, 'kecamatan_create']);
//     Route::post('superadmin/kecamatan/create', [AdminController::class, 'kecamatan_store']);
//     Route::get('superadmin/kecamatan/edit/{id}', [AdminController::class, 'kecamatan_edit']);
//     Route::post('superadmin/kecamatan/edit/{id}', [AdminController::class, 'kecamatan_update']);
//     Route::get('superadmin/kecamatan/delete/{id}', [AdminController::class, 'kecamatan_delete']);

//     Route::get('superadmin/kelurahan', [AdminController::class, 'kelurahan']);
//     Route::get('superadmin/kelurahan/create', [AdminController::class, 'kelurahan_create']);
//     Route::post('superadmin/kelurahan/create', [AdminController::class, 'kelurahan_store']);
//     Route::get('superadmin/kelurahan/edit/{id}', [AdminController::class, 'kelurahan_edit']);
//     Route::post('superadmin/kelurahan/edit/{id}', [AdminController::class, 'kelurahan_update']);
//     Route::get('superadmin/kelurahan/delete/{id}', [AdminController::class, 'kelurahan_delete']);

//     Route::get('superadmin/rt', [AdminController::class, 'rt']);
//     Route::get('superadmin/rt/create', [AdminController::class, 'rt_create']);
//     Route::post('superadmin/rt/create', [AdminController::class, 'rt_store']);
//     Route::get('superadmin/rt/edit/{id}', [AdminController::class, 'rt_edit']);
//     Route::post('superadmin/rt/edit/{id}', [AdminController::class, 'rt_update']);
//     Route::get('superadmin/rt/delete/{id}', [AdminController::class, 'rt_delete']);

//     Route::get('superadmin/sm', [AdminController::class, 'sm']);
//     Route::get('superadmin/sm/create', [AdminController::class, 'sm_create']);
//     Route::post('superadmin/sm/create', [AdminController::class, 'sm_store']);
//     Route::get('superadmin/sm/edit/{id}', [AdminController::class, 'sm_edit']);
//     Route::post('superadmin/sm/edit/{id}', [AdminController::class, 'sm_update']);
//     Route::get('superadmin/sm/delete/{id}', [AdminController::class, 'sm_delete']);

//     Route::get('superadmin/surat', [AdminController::class, 'surat']);
//     Route::get('superadmin/surat/create', [AdminController::class, 'surat_create']);
//     Route::post('superadmin/surat/create', [AdminController::class, 'surat_store']);
//     Route::get('superadmin/surat/edit/{id}', [AdminController::class, 'surat_edit']);
//     Route::post('superadmin/surat/edit/{id}', [AdminController::class, 'surat_update']);
//     Route::get('superadmin/surat/delete/{id}', [AdminController::class, 'surat_delete']);

//     Route::get('superadmin/petugas', [AdminController::class, 'petugas']);
//     Route::get('superadmin/petugas/create', [AdminController::class, 'petugas_create']);
//     Route::post('superadmin/petugas/create', [AdminController::class, 'petugas_store']);
//     Route::get('superadmin/petugas/edit/{id}', [AdminController::class, 'petugas_edit']);
//     Route::post('superadmin/petugas/edit/{id}', [AdminController::class, 'petugas_update']);
//     Route::get('superadmin/petugas/delete/{id}', [AdminController::class, 'petugas_delete']);

//     Route::get('superadmin/pemeriksaan', [AdminController::class, 'pemeriksaan']);
//     Route::get('superadmin/pemeriksaan/create', [AdminController::class, 'pemeriksaan_create']);
//     Route::get('superadmin/pemeriksaan/periksa/{id}', [AdminController::class, 'pemeriksaan_create2']);
//     Route::post('superadmin/pemeriksaan/create2', [AdminController::class, 'pemeriksaan_store']);
//     Route::get('superadmin/pemeriksaan/edit/{id}', [AdminController::class, 'pemeriksaan_edit']);
//     Route::post('superadmin/pemeriksaan/edit/{id}', [AdminController::class, 'pemeriksaan_update']);
//     Route::get('superadmin/pemeriksaan/delete/{id}', [AdminController::class, 'pemeriksaan_delete']);
//     Route::get('superadmin/pemeriksaan/cetak/{id}', [AdminController::class, 'pemeriksaan_cetak']);

//     Route::get('superadmin/registrasi', [AdminController::class, 'registrasi']);
//     Route::get('superadmin/registrasi/create', [AdminController::class, 'registrasi_create']);
//     Route::post('superadmin/registrasi/create', [AdminController::class, 'registrasi_store']);
//     Route::get('superadmin/registrasi/edit/{id}', [AdminController::class, 'registrasi_edit']);
//     Route::post('superadmin/registrasi/edit/{id}', [AdminController::class, 'registrasi_update']);
//     Route::get('superadmin/registrasi/delete/{id}', [AdminController::class, 'registrasi_delete']);

//     Route::get('superadmin/laporan', [AdminController::class, 'laporan']);
//     Route::get('laporan/petugas', [AdminController::class, 'lap_petugas']);
//     Route::get('laporan/registrasi', [AdminController::class, 'lap_registrasi']);
//     Route::get('laporan/pemeriksaan', [AdminController::class, 'lap_pemeriksaan']);
//     Route::get('laporan/rekapitulasi', [AdminController::class, 'lap_rekapitulasi']);
// });

// Route::group(['middleware' => ['auth', 'role:user']], function () {

//     Route::get('user', [HomeController::class, 'user']);
//     Route::get('user/sm', [UserController::class, 'sm']);
//     Route::get('user/sm/create', [UserController::class, 'sm_create']);
//     Route::post('user/sm/create', [UserController::class, 'sm_store']);
//     Route::get('user/sm/edit/{id}', [UserController::class, 'sm_edit']);
//     Route::post('user/sm/edit/{id}', [UserController::class, 'sm_update']);
//     Route::get('user/sm/delete/{id}', [UserController::class, 'sm_delete']);
// });
