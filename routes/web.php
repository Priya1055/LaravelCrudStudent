<?php
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Welcome Page...
Route::get('/', [StudentController::class, 'funStudList']);

//List Page
Route::get('/students', 'StudentController@funStudList');

//Submit Form
Route::get('/StudeInfoForm', function () {
    return view('StudeInfoForm');
})->name('StudeInfoForm');

//// Route for Create Student Info form Submit
Route::post('/submitStudInfo', 'App\Http\Controllers\StudentController@funSubmitStudInfo')->name('submitStudInfo');

// Route for Edit View
Route::get('/edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('edit');

// Route for Update operation
Route::put('/{id}', 'App\Http\Controllers\StudentController@update')->name('update');

// Route for delete operation
Route::post('/delete/{id}', 'App\Http\Controllers\StudentController@destroy')->name('delete');

// Route for search operation
Route::get('/search', [StudentController::class, 'funsearch'])->name('search');

// Route for sort operation
Route::get('/sort', [StudentController::class, 'funsort'])->name('sort');
