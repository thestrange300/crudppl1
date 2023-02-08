<?php

use App\Http\Controllers\PostController;
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
    return redirect('/event');
});


Route::get('/event', [PostController::class, 'index'
])->name('index');

Route::get('/event/create', [PostController::class, 'create'
]);

Route::post('/event', [PostController::class, 'store']);

Route::get('event/{id}/edit',[PostController::class,'edit'])->name('edit');

Route::put('/event/{post}',[PostController::class,'update'])->name('update');

// Route::get('delete/{post}', PostController@destroy);

Route::delete('/delete/{post}', [PostController::class,'destroy'])->name('delete');