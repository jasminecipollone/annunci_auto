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
use Illuminate\Support\Facades\Auth;

class AnnunciController extends Controller
{
    public function index()
    {
        $annunci = Annuncio::orderByDesc('created_at')
                            ->where('venduta', false)
                            ->paginate(5);
        $modelli = Modello::all();
        
        return view('annunci.index', ['annunci' => $annunci, 'modelli' => $modelli ]);
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
        $validated = $request->validate([
            'stato' => 'required',
            'prezzo' => 'required',
            'chilometraggio' => 'required',
            'immatricolazione' => 'required',
            'potenza' => 'required',
            'cilindrata' => 'required',
            'colore' => 'required',
            'alimentazione' => 'required',
            'carrozzeria' => 'required',
            'descrizione' => 'required',
            'indirizzo' => 'required',
            'modello' => 'required',
            'comune' => 'required',
            'cambio' => 'required',
            'posti' => 'required',
            'porte' => 'required',
        ]);

        $annuncio = new Annuncio();
        $annuncio->stato = Ucwords($request->stato);
        $annuncio->prezzo = $request->prezzo;
        $annuncio->chilometraggio = $request->chilometraggio;
        $annuncio->immatricolazione = $request->immatricolazione;
        $annuncio->potenza = $request->potenza;
        $annuncio->cilindrata = $request->cilindrata;
        $annuncio->colore = Ucwords($request->colore);
        $annuncio->alimentazione = Ucwords($request->alimentazione);
        $annuncio->carrozzeria = Ucwords($request->carrozzeria);
        $annuncio->descrizione = $request->descrizione;
        $annuncio->indirizzo = Ucwords($request->indirizzo);

        $path = $request->file('immagine')->store('public/immagini');
        $nomeimmagine = explode("/", $path);
        $annuncio->immagine = $nomeimmagine[2];

        $annuncio->user_id = Auth::id();
        $annuncio->modello_id = $request->modello;
        $annuncio->comune_id = $request->comune;
        $annuncio->titolo = $request->modello;
        $annuncio->save();

        $dettagli = new Dettagli();
        $dettagli->id = $annuncio->id;
        $dettagli->proprietari = $request->proprietari;
        $dettagli->cambio = Ucwords($request->cambio);
        $dettagli->vernice = Ucwords($request->vernice);
        $dettagli->rivestimenti = Ucwords($request->rivestimenti);
        $dettagli->posti = $request->posti;
        $dettagli->porte = $request->porte;
        $dettagli->consumi = $request->consumi;
        $dettagli->emissioni = Ucwords($request->emissioni);
        /*$dettagli->equipaggiamento = [$request->alzacristalli, $request->clima, $request->autoclima, $request->specchietti, $request->volantepelle, 
        $request->volantemulti, $request->cbordo, $request->lega, $request->luci, $request->ruota, $request->abs, $request->antifurto, $request->airbagc,
        $request->airbagp, $request->airbagl, $request->immobilizzatore, $request->chiusurac, $request->trazione, $request->fendinebbia, $request->frenata,
        $request->servosterzo, $request->pressione, $request->esp, $request->corsia, $request->autonoma];*/
        $dettagli->save();



        Mail::to('jasmine@gmail.com')->send(new NewCarInsert());

        return redirect()->route('dashboard')->with('msg', 'Veicolo correttamente inserito');
    }

    public function show($id){
        $annuncio = Annuncio::findOrFail($id);
        $dettagli = Dettagli::find($id);
        return view('annunci.show', compact('annuncio', 'dettagli'));
    }

    public function destroy($id)
    {
        $annuncio = Annuncio::find($id);
        $annuncio->venduta = true;
        $annuncio->save();

        return back()->with('msg', 'Articolo segnalato come venduto!');
    }
   

    public function edit($id)
    {
        $regioni = DB::table('comuni')
                    ->select('regione')
                    ->distinct()
                    ->get();

        $marche = Marca::all();

        $annuncio = Annuncio::find($id);
        return view('annunci.edit', compact('annuncio', 'regioni', 'marche'));
    }

    public function update(Request $request, $id)
    {
        $annuncio = Annuncio::find($id);
        $annuncio->stato = Ucwords($request->stato);
        $annuncio->prezzo = $request->prezzo;
        $annuncio->chilometraggio = $request->chilometraggio;
        $annuncio->immatricolazione = $request->immatricolazione;
        $annuncio->potenza = $request->potenza;
        $annuncio->cilindrata = $request->cilindrata;
        $annuncio->colore = Ucwords($request->colore);
        $annuncio->alimentazione = Ucwords($request->alimentazione);
        $annuncio->carrozzeria = Ucwords($request->carrozzeria);
        $annuncio->descrizione = $request->descrizione;
        $annuncio->indirizzo = Ucwords($request->indirizzo);

        $path = $request->file('immagine')->store('public/immagini');
        $nomeimmagine = explode("/", $path);
        $annuncio->immagine = $nomeimmagine[2];

        $annuncio->modello_id = $request->modello;
        $annuncio->comune_id = $request->comune;
        $annuncio->titolo = $request->modello;
        $annuncio->save();

        $dettagli = Dettagli::find($id);
        $dettagli->proprietari = $request->proprietari;
        $dettagli->cambio = Ucwords($request->cambio);
        $dettagli->vernice = Ucwords($request->vernice);
        $dettagli->rivestimenti = Ucwords($request->rivestimenti);
        $dettagli->posti = $request->posti;
        $dettagli->porte = $request->porte;
        $dettagli->consumi = $request->consumi;
        $dettagli->emissioni = Ucwords($request->emissioni);
        /*$dettagli->equipaggiamento = [$request->alzacristalli, $request->clima, $request->autoclima, $request->specchietti, $request->volantepelle, 
        $request->volantemulti, $request->cbordo, $request->lega, $request->luci, $request->ruota, $request->abs, $request->antifurto, $request->airbagc,
        $request->airbagp, $request->airbagl, $request->immobilizzatore, $request->chiusurac, $request->trazione, $request->fendinebbia, $request->frenata,
        $request->servosterzo, $request->pressione, $request->esp, $request->corsia, $request->autonoma];*/
        $dettagli->save();

        return redirect()->route('dashboard')->with('msg', 'Veicolo correttamente aggiornato!');
    }
}
