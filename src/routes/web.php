<?php

use App\Http\Controllers\AnnunciController;
use App\Http\Controllers\UserController;
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
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



//CONTROLLER DEGLI UTENTI


//CONTROLLER DEGLI ANNUNCI
Route::get('/annunci', [AnnunciController::class, 'index'])->name('annunci.index');
Route::get('/annunci/create', [AnnunciController::class, 'create'])->name('annunci.create');

Route::get('/annuncimodelli/{id}', function ($id) {
    $modello = App\Models\Modello::where('marca_id',$id)->get();
    return response()->json($modello);
});

Route::post('annunci/store', [AnnunciController::class, 'store'])->name('annunci.store');
Route::get('/annunci/{id}', [AnnunciController::class, 'show'])->name('annunci.show');
Route::get('/annunci/{id}/edit', [AnnunciController::class, 'edit'])->name('annunci.edit');
Route::post('annunci/{id}/update', [AnnunciController::class, 'update'])->name('annunci.update');
Route::get('/annunci/{id}/destroy', [AnnunciController::class, 'destroy'])->name('annunci.destroy');


require __DIR__.'/auth.php';
