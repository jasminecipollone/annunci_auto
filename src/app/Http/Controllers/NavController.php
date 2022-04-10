<?php

namespace App\Http\Controllers;

use App\Mail\InfoCar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recensione;
use App\Models\Annuncio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class NavController extends Controller
{
    public function mycars(){
        $annunci = User::find(Auth::id())->annunci->sortByDesc('created_at')->where('venduta', false);
        return view('users.mycars', ['annunci' => $annunci]);
    }

    public function carssold(){
        $annunci = User::find(Auth::id())->annunci->where('venduta', true);
        return view('users.carssold', ['annunci' => $annunci]);
    }

    public function mystats(){
        $vendute = User::find(Auth::id())->annunci->where('venduta', true)->count();
        $vendita = User::find(Auth::id())->annunci->where('venduta', false)->count();

        $prezzo_nonvendute = DB::table('annunci') 
                ->where('venduta', '=', false)
                ->where('user_id', '=', Auth::id())
                ->sum('prezzo');

        $prezzo_vendute = DB::table('annunci') 
                ->where('venduta', '=', true)
                ->where('user_id', '=', Auth::id())
                ->sum('prezzo');         

        return view('users.mystats', ['vendute' => $vendute, 'vendita' => $vendita, 'prezzov' => $prezzo_vendute, 'prezzon' => $prezzo_nonvendute]);
    }

    public function returnsell($id){
        $annuncio = Annuncio::find($id);
        $annuncio->venduta = false;
        $annuncio->save();
        
        return back()->with('msg', 'Veicolo rimesso in vendita!');

    }

    public function removeforever($id){
        $annuncio = Annuncio::find($id);
        if(Auth::user()->role == 'true'){
        if (Storage::exists('public/immagini/' . $annuncio->immagine)) {
            Storage::delete('public/immagini/' . $annuncio->immagine);
        }
        $annuncio->delete();
        }
        return back()->with('msg', 'Veicolo eliminato definitivamente!');
    }

    public function makeadmin($id){
        $user = User::find($id);
        $user->role = true;
        $user->save();
        
        return back()->with('msg', 'Utente trasformato in Admin!');
    }

    public function info($id, Request $request){
        $annuncio = Annuncio::find($id);
        $proprietario = $request->proprietario;
        $interessato = $request->interessato;
        $info = $request->info;

        Mail::to($proprietario)->send(new InfoCar($annuncio, $interessato, $info));

        return back()->with('msg', 'Email inviata con successo!');
    }

    public function profile($id){
        $user = User::find($id);
        $vendute = $user->annunci->where('venduta', true)->count();
        $nonvendute = $user->annunci->where('venduta', false)->count();

        $media = DB::table('recensioni') 
                ->where('user_id', '=', $id)
                ->avg('valutazione');
        
        $recensioni = Recensione::where('user_id', $id)->orderByDesc('created_at')->paginate(5);

        return view('users.profile', ['user' => $user, 'vendute' => $vendute, 'nonvendute' => $nonvendute, 'recensioni' => $recensioni, 'media' => $media]);
    }
}
