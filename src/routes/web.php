<?php

use App\Http\Controllers\AnnunciController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
    return view('users.dashboard');
})->middleware(['auth'])->name('dashboard');

//CONTROLLER NAVBAR INTERNA UTENTI LOGGATI
Route::get('/mycars', [NavController::class, 'mycars'])->name('user.mycars')->middleware('auth');
Route::get('/carssold', [NavController::class, 'carssold'])->name('user.carssold')->middleware('auth');
Route::get('/mystats', [NavController::class, 'mystats'])->name('user.mystats')->middleware('auth');

//CONTROLLER DEGLI UTENTI


//CONTROLLER DEGLI ANNUNCI
Route::get('/annunci', [AnnunciController::class, 'index'])->name('annunci.index');
Route::get('/annunci/create', [AnnunciController::class, 'create'])->name('annunci.create');
Route::post('/annunci/store', [AnnunciController::class, 'store'])->name('annunci.store');
Route::get('/annunci/{id}', [AnnunciController::class, 'show'])->name('annunci.show');
Route::get('/annunci/{id}/destroy', [AnnunciController::class, 'destroy'])->name('annunci.destroy');


//API SELECT MODELLI AUTO E REGIONE PROVINCIA COMUNE
Route::get('/annuncimodelli/{id}', function ($id) {
    $modello = App\Models\Modello::where('marca_id',$id)->get();
    return response()->json($modello);
});

Route::get('/provincia/{regione}', function ($regione) {
    $province = DB::table('comuni')
                    ->select('provincia')
                    ->where('regione', $regione)
                    ->distinct()
                    ->get();

    return response()->json($province);
});

Route::get('/comune/{provincia}', function ($provincia) {
    $comuni = App\Models\Comune::where('provincia', $provincia)->get();
    return response()->json($comuni);
});


//CRUD DEL DB ANNUNCI 

Route::get('/annunci/{id}/edit', [AnnunciController::class, 'edit'])->name('annunci.edit');
Route::post('annunci/{id}/update', [AnnunciController::class, 'update'])->name('annunci.update');


require __DIR__.'/auth.php';
