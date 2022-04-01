<?php

namespace App\Http\Controllers;

use App\Mail\NewCarInsert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Annuncio;
use App\Models\Marca;
use App\Models\Modello;

class AnnunciController extends Controller
{
    public function index()
    {
        $annunci = Annuncio::all();
        return view('annunci.index', ['annunci' => $annunci]);
    }

    public function create()
    {

        $marche = Marca::all();
        //$modello = Modello::find($marche);
        return view('annunci.create', ['marche' => $marche]);
    }

    public function store(Request $request)
    {
        $annuncio = new Annuncio();
        $annuncio->stato = $request->stato;
        $annuncio->prezzo = $request->prezzo;
        $annuncio->chilometraggio = $request->chilometraggio;
        $annuncio->immatricolazione = $request->immatricolazione;
        $annuncio->potenza = $request->potenza;
        $annuncio->cilindrata = $request->cilindrata;
        $annuncio->colore = $request->colore;
        $annuncio->alimentazione = $request->alimentazione;
        $annuncio->carrozzeria = $request->carrozzeria;
        $annuncio->descrizione = $request->descrizione;
        $annuncio->indirizzo = $request->indirizzo;

        $annuncio->user_id = 1;
        $annuncio->modello_id = $request->marca;
        $annuncio->comune_id = 1;
        $annuncio->titolo = $annuncio->modello_id;
        $annuncio->save();

        Mail::to('jasmine@gmail.com')->send(new NewCarInsert());

        return redirect()->route('index')->with('msg', 'Veicolo correttamente inserito');
    }
}
