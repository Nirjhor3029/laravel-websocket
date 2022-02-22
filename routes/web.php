<?php

use App\Http\Controllers\TriggerController;
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
Route::get('/show', function () {
    return view('show');
});

// Route::get('/trigger/{data}', function ($data) {
//     echo "<p>You have sent $data</p>";
//     event(new App\Events\GetRequestEvent($data));
// });
Route::get('/trigger', [TriggerController::class, 'index'])->name('index');

Route::post('/trigger', [TriggerController::class, 'trigger'])->name('trigger');