<?php

use App\Http\Controllers\AnnunciController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\RecensioniController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchController;
use App\Models\Annuncio;
use Illuminate\Http\Request;
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

//SEARCH BAR

Route::get('/results', [SearchController::class, 'search'])->name('results');


//Route::get('/results', function (Request $request) {
    //dd($request);


    /*$annunci = DB::table('annunci')
    ->join('modelli', 'annunci.modello_id', '=', 'modelli.id')
    ->select('annunci.*', 'modelli.*')
    ->where('modelli.nome', 'ilike', '%' . $request->input('cerca') . '%')
    ->get();*/

   /*$annunci = Annuncio::
        where('titolo', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('stato', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('prezzo', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('chilometraggio', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('immatricolazione', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('potenza', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('cilindrata', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('carrozzeria', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('indirizzo', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('descrizione', 'ilike', '%' . $request->input('cerca') . '%')
        ->orWhere('colore', 'ilike', '%' . $request->input('cerca') . '%')
        ->where('venduta', '=' , false)
        ->paginate(5);

    return view('results', ['annunci' => $annunci], compact('annunci','request'));*/

//})->name('results');

//CONTROLLER NAVBAR INTERNA UTENTI LOGGATI
Route::get('/mycars', [NavController::class, 'mycars'])->name('user.mycars')->middleware('auth');
Route::get('/carssold', [NavController::class, 'carssold'])->name('user.carssold')->middleware('auth');
Route::get('/mystats', [NavController::class, 'mystats'])->name('user.mystats')->middleware('auth');
Route::get('/returnsell/{id}', [NavController::class, 'returnsell'])->name('user.return')->middleware('auth');
Route::get('carssold/{id}/remove', [NavController::class, 'removeuserpanel'])->name('user.removecar')->middleware('auth');

//CONTROLLER DEGLI UTENTI
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::get('/user/{id}/profile', [NavController::class, 'profile'])->name('users.profile');
Route::get('/user/{id}/cars', [NavController::class, 'usercars'])->name('users.cars');



//CONTROLLER DEGLI ANNUNCI
Route::get('/annunci', [AnnunciController::class, 'index'])->name('annunci.index');
Route::get('/annunci/create', [AnnunciController::class, 'create'])->name('annunci.create')->middleware('auth');
Route::post('/annunci/store', [AnnunciController::class, 'store'])->name('annunci.store')->middleware('auth');
Route::get('/annunci/{id}', [AnnunciController::class, 'show'])->name('annunci.show');
Route::get('/annunci/{id}/destroy', [AnnunciController::class, 'destroy'])->name('annunci.destroy')->middleware('auth');
Route::get('/annunci/{id}/edit', [AnnunciController::class, 'edit'])->name('annunci.edit')->middleware('auth');
Route::post('annunci/{id}/update', [AnnunciController::class, 'update'])->name('annunci.update')->middleware('auth');

//CONTROLLER RECENSIONI
Route::post('/recensioni/store', [RecensioniController::class, 'store'])->name('recensioni.store')->middleware('auth');
Route::delete('/comments/{id}/destroy', [RecensioniController::class, 'destroy'])->name('recensioni.destroy')->middleware('auth');

//CONTROLLER DELLE EMAIL
Route::post('/annunci/{id}/info', [MailController::class, 'info'])->name('annunci.info')->middleware('auth');


//ADMIN ROUTES
Route::get('/admin',function(){
    return view('admin.index');
})->middleware('admin');

Route::get('/notauth',function(){
    return view('notauth');
})->name('notauth');

Route::get('/admin/users',[UserAdminController::class, 'users'])->name('admin.users.index')->middleware('admin');
Route::get('/admin/annunci',[UserAdminController::class, 'annunci'])->name('admin.annunci.index')->middleware('admin');
Route::get('/admin/recensioni',[UserAdminController::class, 'recensioni'])->name('admin.recensioni.index')->middleware('admin');

Route::get('annunci/{id}/remove', [NavController::class, 'removeforever'])->name('annunci.remove')->middleware('admin');
Route::get('user/{id}/makeadmin', [NavController::class, 'makeadmin'])->name('user.makeadmin')->middleware('admin');


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





require __DIR__.'/auth.php';
