<?php

use App\Http\Controllers\AtasanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RekapController;
use App\Models\Atasan;
use Illuminate\Support\Facades\Auth;
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
    return redirect('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'Persetujuan', 'middleware' => ['auth','atasan']], function () {
    
    Route::resource('atasan', AtasanController::class);
    Route::get('status/{id}/atasan', [App\Http\Controllers\AtasanController::class, 'status'])->name('status');
    
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('rekap', RekapController::class);
    Route::get('/export/tgl_awal/tgl_akhir', [App\Http\Controllers\RekapController::class, 'export'])->name('export');

});
