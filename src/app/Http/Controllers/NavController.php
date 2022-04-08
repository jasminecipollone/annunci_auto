<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annuncio;

class NavController extends Controller
{
    public function mycars(){
        $annunci = User::find(Auth::id())->annunci->where('venduta', false);
        return view('users.mycars', ['annunci' => $annunci]);
    }

    public function carssold(){
        $annunci = User::find(Auth::id())->annunci->where('venduta', true);
        return view('users.carssold', ['annunci' => $annunci]);
    }

    public function mystats(){
        $vendute = User::find(Auth::id())->annunci->where('venduta', true)->count();
        $vendita = User::find(Auth::id())->annunci->where('venduta', false)->count();

        return view('users.mystats', ['vendute' => $vendute, 'vendita' => $vendita]);
    }
}
