<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController as PageController;

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

Route::get('/',[PageController::class, 'index'])->name('page');

Route::get('/', function () {
    $comics = config('db.series');

    return view('home', compact('comics'));
})->name('homepage');

Route::get('/comics/{series}', function ($series){

    $comics = config('db.series');

    foreach($comics as $comic){
        if($comic['series'] == $series){
            $single = $comic;
        }
    };

    return view('comics_details', compact('single'));

})->name('comics-details');