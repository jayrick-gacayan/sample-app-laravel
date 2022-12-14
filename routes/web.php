<?php

use Illuminate\Support\Facades\Route;


/* Controllers */
use App\Http\Controllers\CountryController;

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

Route::prefix('country')->group(
    function(){
        Route::get('/all',[CountryController::class, 'getAllCountriesWithInfo']);
        Route::get('/{countryCode}',[CountryController::class, 'getCountryInfoWithHolidays']);
    }
);
