<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\bkcontroller;
use App\Http\Controllers\klscontroller;
use App\Http\Controllers\sswcontroller;
use App\Http\Controllers\transaksicontroller;
use App\Http\Controllers\API\AuthController;
use App\Models\bkmodel;
use App\Models\klsmodel;
use App\Models\sswmodel;
use App\Models\transaksimodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//siswa
Route::get('/getsiswa', [sswcontroller::class, 'getsiswa']);
Route::post('/addsiswa', [sswcontroller::class, 'addsiswa']);
Route::put('/updatesiswa/{id}', [sswcontroller::class, 'updatesiswa']);
Route::delete('/deletesiswa/{id}', [sswcontroller::class, 'deletesiswa']);
Route::get('/getsiswaid/{id}', [sswcontroller::class, 'getsiswaid']);

//kelas
Route::get('/getkelas', [klscontroller::class, 'getkelas']);
Route::post('/addkelas', [klscontroller::class, 'addkelas']);
Route::put('/updatekelas/{id}', [klscontroller::class, 'updatekelas']);
Route::delete('/deletekelas/{id}', [klscontroller::class, 'deletekelas']);
Route::get('/getkelasid/{id}', [klscontroller::class, 'getkelasid']);

//buku
Route::get('/getbuku', [bkcontroller::class, 'getbuku']);
Route::post('/addbuku', [bkcontroller::class, 'addbuku']);
Route::put('/updatebuku/{id}', [bkcontroller::class, 'updatebuku']);
Route::delete('/deletebuku/{id}', [bkcontroller::class, 'deletebuku']);
Route::get('/getbukuid/{id}', [bkcontroller::class, 'getbukuid']);

//transaksi
Route::get('/getpinjam', [transaksicontroller::class, 'getpinjam']);
Route::post('/pinjambuku', [transaksicontroller::class,'pinjambuku']);
Route::post('/tambahitem/{id}', [transaksicontroller::class,'tambahitem']);
Route::post('/bukukembali', [transaksicontroller::class,'bukukembali']);

//auth
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::post('/refresh', [AuthController::class, 'refresh']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
