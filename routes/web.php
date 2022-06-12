<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchController1;

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
    return view('searchEngine');
});

// Route::get('/result', function () {
//     return view('resultEngine');
// });

Route::get('/search', [SearchController1::class, 'search']);
// Route::get('/search', [SearchController::class, 'display']);

