<?php


use App\Presentation\Auth\AuthController;
use App\Presentation\Auth\VerifyController;
use App\Presentation\Clients\ClientController;
use App\Presentation\Establishments\EstablishmentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::controller()->middleware(['auth:sanctum','verified'])->group();
//Route::middleware('auth:sanctum')->;

Route::prefix('create')->middleware(['auth:sanctum','verified'])->group(function(){
    Route::post('/client',[ClientController::class,'create']);
    Route::post('/establishment',[EstablishmentsController::class,'create']);

});

Route::prefix('client')->middleware(['auth:sanctum','verified','cliente'])->group(function(){

});

Route::prefix('establishments')->controller(EstablishmentsController::class)->middleware(['auth:sanctum','verified','establishment'])->group(function(){
    Route::post('/create-schedule','create_schedule');
    Route::post('/create-prices','create_price');
    Route::post('/register-employee','register_employee');
    Route::get('/{id}','get')->withoutMiddleware(['auth:sanctum','verified','establishment']);
});


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//Route::post('/verification');

Route::get('/email/verify/{id}',[VerifyController::class,'verification'])->name('verification.verify');

//Route::get('/email/verify/{id}/{hash}',[VerifyController::class,]);

