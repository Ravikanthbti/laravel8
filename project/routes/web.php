<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\CustomerController;





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

Route::get('hello', function () {
    return view('add1-artical');
});



Route::get('/add-artical', [ArticalController::class, 'addArtical'])->name('add-artical');
Route::post('/add-artical', [ArticalController::class, 'storeArtical']);
Route::get('/show-artical', [ArticalController::class, 'showArtical']);
Route::get('/edit-artical/{id}', [ArticalController::class, 'editArtical']);
Route::post('/edit-artical/{id}', [ArticalController::class, 'updateArtical']);
Route::get('/delete-artical/{id}', [ArticalController::class, 'deleteArtical']);
Route::get('/sessionflush', [ArticalController::class, 'sessioflush']);

Route::get('users', [UserController::class, 'index']);
Route::get('changeStatus', [UserController::class, 'changeStatus']);

//payment gatway controller
Route::get('checkout',[CheckoutController::class, 'checkout']);
Route::post('checkout',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');


//*********************************************ajax****************************

Route::get('posts', [PostController::class, 'index']);

Route::post('post', [PostController::class, 'store']);

Route::put('post', [PostController::class, 'update']);

Route::delete('post/{post_id}', [PostController::class, 'destroy']);
//*********************************************************************

Route::resource('books', BookController::class);
//route middleware 
//Route::get('home', [HomeController::class,'home'])->middleware('checkStatus');

//group middleware
 Route::middleware([CheckStatus::class])->group(function(){
     Route::get('home', [HomeController::class,'home']);
     Route::get('index', [HomeController::class,'index']);

  });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('gestcustomer',[CustomerController::class,'gestcustomer']);
Route::post('storecustomer',[CustomerController::class,'storecustomer']);
Route::get('list',[CustomerController::class,'list']);


//Ajax student crud
Route::get('student','App\Http\Controllers\StudentController@index');
Route::post('student','App\Http\Controllers\StudentController@store')->name('student.store');
Route::get('student/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
Route::post('student/update', 'App\Http\Controllers\StudentController@update')->name('student.update');
Route::get('student/{id}/delete', 'App\Http\Controllers\StudentController@destroy')->name('student.delete');




Route::get('/add-member', [ArticalController::class, 'addMember'])->name('add-member');
Route::post('/add-member', [ArticalController::class, 'storemember']);
Route::get('/add-passport', [ArticalController::class, 'addPassport'])->name('add-passport');
//Route::post('/add-passport', [ArticalController::class, 'storePassport']);
 
?>
























