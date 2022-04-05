<?php

namespace App\Http\Controllers;

use App\Mail\NewCarInsert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Annuncio;
use App\Models\Marca;
use App\Models\Modello;
use App\Models\Comune;
use App\Models\Dettagli;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostInc;

class AnnunciController extends Controller
{
    public function index()
    {
        $annunci = Annuncio::all();
        $modelli = Modello::all();
        
        return view('annunci.index', ['annunci' => $annunci, 'modelli' => $modelli]);
    }

    public function create()
    {
        $regioni = DB::table('comuni')
                    ->select('regione')
                    ->distinct()
                    ->get();

        $marche = Marca::all();
        return view('annunci.create', ['marche' => $marche, 'regioni' => $regioni]);
    }

    public function store(Request $request)
    {
        //dd($request);
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
        $annuncio->modello_id = $request->modello;
        $annuncio->comune_id = 1;
        $annuncio->titolo = $request->modello;
        $annuncio->save();

        $dettagli = new Dettagli();
        $dettagli->id = $annuncio->id;
        $dettagli->proprietari = $request->proprietari;
        $dettagli->cambio = $request->cambio;
        $dettagli->vernice = $request->vernice;
        $dettagli->rivestimenti = $request->rivestimenti;
        $dettagli->posti = $request->posti;
        $dettagli->porte = $request->porte;
        $dettagli->consumi = $request->consumi;
        $dettagli->emissioni = $request->emissioni;
        /*$dettagli->equipaggiamento = [$request->alzacristalli, $request->clima, $request->autoclima, $request->specchietti, $request->volantepelle, 
        $request->volantemulti, $request->cbordo, $request->lega, $request->luci, $request->ruota, $request->abs, $request->antifurto, $request->airbagc,
        $request->airbagp, $request->airbagl, $request->immobilizzatore, $request->chiusurac, $request->trazione, $request->fendinebbia, $request->frenata,
        $request->servosterzo, $request->pressione, $request->esp, $request->corsia, $request->autonoma];*/
        $dettagli->save();



        Mail::to('jasmine@gmail.com')->send(new NewCarInsert());

        return redirect()->route('index')->with('msg', 'Veicolo correttamente inserito');
    }
}
