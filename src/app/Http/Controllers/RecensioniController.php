<?php

namespace App\Http\Controllers;

use App\Mail\RecensioneEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Recensione;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RecensioniController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        $recensione = new Recensione;
        $recensione->valutazione = $request->valutazione;
        $recensione->user_id = $request->user_id;
        $recensione->user_id_who = Auth::id();
        $recensione->user_name_who = Auth::user()->name;
        $recensione->commento = $request->commento;
        $recensione->save();

        $emailricevente = User::select('email')->where('id', $recensione->user_id)->first()->email;


        Mail::to($emailricevente)->send(new RecensioneEmail());

        return back()->with('msg', 'Recensione aggiunta con successo!');
    }


    public function destroy($id)
    {
        $recensione = Recensione::find($id);
        $recensione->delete();
        return back()->with('msg', 'Recensione eliminata con successo!');
    }
}
