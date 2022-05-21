<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(MovieController::class)->group(function () {

    Route::get('/movies/create', 'create')
        //->middleware(['auth','can:create, App\Movie'])
        ->name('movies.create');

    Route::post('/movies', 'store')
        //->middleware(['auth','can:create, App\Movie'])
        ->name('movies.store');

    Route::get('/movies', 'index')->name('movies.index');
    Route::get('/movies/{id}', 'show')
        //->middleware(['auth','can:show, App\Movie'])
        ->name('movies.show');

    Route::get('/movies/{id}/edit', 'edit')
        //->middleware(['auth','can:update, App\Movie'])
        ->name('movies.edit');

    Route::put('/movies/{id}', 'update')
        //->middleware(['auth','can:update, App\Movie'])
        ->name('movies.update');

    Route::get('/movies/{id}/delete', 'delete')
        //->middleware(['auth','can:delete, App\Movie'])
        ->name('movies.delete');

    Route::delete('/movies/{id}', 'destroy')
        //->middleware(['auth','can:delete, App\Movie'])
        ->name('movies.destroy');

    Route::get('/movies/{id}/reviews/create', 'createReview')
        //->middleware(['auth','can:storeReview, App\Movie'])
        ->name('movies.add.review');

    Route::post('/movies/{id}/reviews', 'storeReview')
        //->middleware(['auth','can:storeReview, App\Movie'])
        ->name('movies.save.review');

    Route::delete('/movies/{id}/reviews/{review}', 'destroyReview')
        //->middleware(['auth','can:destroyReview, App\Movie'])
        ->name('movies.destroy.review');
});


