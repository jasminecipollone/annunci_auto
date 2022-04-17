<?php

namespace App\Http\Controllers;

use App\Models\Annuncio;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Comune;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //dd($request);
        $regioni = DB::table('comuni')
            ->select('regione')
            ->distinct()
            ->get();

        $marche = Marca::all();

        $results = Annuncio::query()
                            ->join('comuni', 'comuni.id', '=', 'annunci.comune_id')
                            ->join('dettagli', 'dettagli.id', '=', 'annunci.id')
                            ->join('modelli', 'modelli.id', '=', 'annunci.modello_id');

        if (!empty($request->stato)) {
            $results = $results->where('stato', 'ilike', $request->stato);
        }

        if (!empty($request->regione)) {
            $results = $results->where('regione', 'ilike', $request->regione);
        }

        if (!empty($request->provincia)) {
            $results = $results->where('provincia', 'ilike', $request->provincia);
        }

        if (!empty($request->comune)) {
            $results = $results->where('comuni.id', 'ilike', $request->comune);
        }

        if (!empty($request->alimentazione)) {
            $results = $results->where('alimentazione', 'ilike', $request->alimentazione);
        }

        if (!empty($request->potenza)) {
            $results = $results->where('potenza', '>', $request->potenza);
        }

        if (!empty($request->rivestimenti)) {
            $results = $results->where('dettagli.rivestimenti', 'ilike', $request->rivestimenti);
        }

        if (!empty($request->cambio)) {
            $results = $results->where('dettagli.cambio', 'ilike', $request->cambio);
        }

        if (!empty($request->cilindrata)) {
            $results = $results->where('cilindrata', '>', $request->cilindrata);
        }

        if (!empty($request->prezzo_da)) {
            $results = $results->where('prezzo', '>=', $request->prezzo_da);
        }

        if (!empty($request->prezzo_a)) {
            $results = $results->where('prezzo', '<=', $request->prezzo_a);
        }

        if (!empty($request->anno_da)) {
            $results = $results->whereYear('immatricolazione', '>=', $request->anno_da);
        }

        if (!empty($request->anno_a)) {
            $results = $results->whereYear('immatricolazione', '<=', $request->anno_a);
        }

        if (!empty($request->km_da)) {
            $results = $results->where('chilometraggio', '>=', $request->km_da);
        }

        if (!empty($request->km_a)) {
            $results = $results->where('chilometraggio', '<=', $request->km_a);
        }

        if (!empty($request->marca)) {
            $results = $results->where('modelli.marca_id', 'ilike', $request->marca);
        }

        if (!empty($request->modello)) {
            $results = $results->where('modelli.id', 'ilike', $request->modello);
        }
        

        //dd($results);
        $annunci = $results->where('venduta', false)->paginate(5);

        return view('/results', ['annunci' => $annunci, 'regioni' => $regioni, 'marche' => $marche]);
    }
}
