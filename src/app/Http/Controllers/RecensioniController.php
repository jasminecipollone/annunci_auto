<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Recensione;
use App\Models\User;

class RecensioniController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $recensione = new Recensione;
        $recensione->valutazione = $request->valutazione;
        $recensione->user_id = $request->user_id;
        $recensione->user_id_who = Auth::user()->name;
        $recensione->commento = $request->commento;
        $recensione->save();

        return back()->with('msg', 'Recensione aggiunta con successo!');
    }

    public function index(){
        
    }
}
