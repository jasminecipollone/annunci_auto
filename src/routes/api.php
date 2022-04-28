<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Annuncio;
use App\Models\Modello;
use App\Models\Marca;
use App\Models\User;
use App\Models\Comune;
use App\Models\Dettagli;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/allcars', function () {
    $annunci = Annuncio::where('venduta', false)->get();
    $annunci = $annunci->toArray();
    foreach ($annunci as $key => $annuncio) {
        $modello = Modello::find($annuncio['modello_id']);
        $marca = Marca::find($modello->marca_id)->nome;
        $user_name = User::find($annuncio['user_id'])->name;
        $comune = Comune::find($annuncio['comune_id'])->comune;
        $provincia = Comune::find($annuncio['comune_id'])->provincia;
        $regione = Comune::find($annuncio['comune_id'])->regione;
        $dettagli = Dettagli::find($annuncio['id']);

        $annunci[$key]['modello_nome'] = $modello->nome;
        $annunci[$key]['marca_nome'] = $marca;
        $annunci[$key]['user_name'] = $user_name;
        $annunci[$key]['comune'] = $comune;
        $annunci[$key]['provincia'] = $provincia;
        $annunci[$key]['regione'] = $regione;
        $annunci[$key]['proprietari'] = $dettagli['proprietari'];
        $annunci[$key]['cambio'] = $dettagli['cambio'];
        $annunci[$key]['consumi'] = $dettagli['consumi'];
    }
    return response()->json($annunci);
});
