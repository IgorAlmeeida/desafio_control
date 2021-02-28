<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/service');
})->name('home');

//-------------------------------Service---------------------------------------------//

Route::get('/service', [ServiceController::class, 'list'])
    ->name('listService')
    ->middleware('auth');

Route::get('/service/create', [ServiceController::class, 'createView'])
    ->name('createServiceView')
    ->middleware('auth');

Route::post('/service/create', [ServiceController::class, 'create'])
    ->name('createService')
    ->middleware('auth');

Route::get('/service/update/{idService}', [ServiceController::class, 'updateView'])
    ->name('updateServiceView')
    ->middleware('auth');

Route::post('/service/update/{idService}', [ServiceController::class, 'update'])
    ->name('updateService')
    ->middleware('auth');

Route::get('/service/delete/{idService}', [ServiceController::class, 'delete'])
    ->name('deleteService')
    ->middleware('auth');


//-------------------------------Service Order---------------------------------------------//

Route::get('/service_order', [ServiceOrderController::class, 'list'])
    ->name('listServiceOrder')
    ->middleware('auth');

Route::get('/service_order/create', [ServiceOrderController::class, 'createView'])
    ->name('createServiceOrderView')
    ->middleware('auth');

Route::post('/service_order/create', [ServiceOrderController::class, 'create'])
    ->name('createServiceOrder')
    ->middleware('auth');

Route::get('/service_order/update/{idServiceOrder}', [ServiceOrderController::class, 'updateView'])
    ->name('updateServiceOrderView')
    ->middleware('auth');

Route::post('/service_order/update/{idServiceOrder}', [ServiceOrderController::class, 'update'])
    ->name('updateServiceOrder')
    ->middleware('auth');

Route::get('/service_order/delete/{idServiceOrder}', [ServiceOrderController::class, 'delete'])
    ->name('deleteServiceOrder')
    ->middleware('auth');

Route::get('/report', [ServiceOrderController::class, 'generateReport'])
    ->name('report')
    ->middleware('auth');

//-----------------------------------------------------------------------------------------------------

Route::get('/profile',[ProfileController::class, 'updateViewProfile'])
    ->name('profileUpdateView')
    ->middleware('auth');

Route::post('/profile',[ProfileController::class, 'updateProfile'])
    ->name('profileUpdate')
    ->middleware('auth');




