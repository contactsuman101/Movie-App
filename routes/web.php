<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\MovieIndex;
use App\Http\Livewire\SerieIndex;
use App\Http\Livewire\SeasonIndex;
use App\Http\Livewire\CastIndex;
use App\Http\Livewire\GenreIndex;
use App\Http\Livewire\TagIndex;
use App\Http\Livewire\EpisodeIndex;

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

// Route::get('/admin', function () {
//     return "Admins are here";
// })->middleware('role:admin')->name('admin.index');

// Route::group(['middleware' => 'role:admin'], function(){

//     Route::get('/admin', function () {
//         return "Admins are here";
//     })->name('admin.index');

// });

Route::middleware(['auth:sanctum','verified','role:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index '])->name('index');
    Route::get('movies', MovieIndex::class)->name('movies.index');
    Route::get('series', SerieIndex::class)->name('series.index');
    Route::get('series/{serie}/seasons', SeasonIndex::class)->name('seasons.index');
    Route::get('series/{serie}/seasons/{season}/episodes', EpisodeIndex::class)->name('episodes.index');
    Route::get('genres', GenreIndex::class)->name('genres.index');
    Route::get('casts', CastIndex::class)->name('casts.index');
    Route::get('tags', TagIndex::class)->name('tags.index');


});

Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

