<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Recensione;
use App\Models\Annuncio;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function annunci(){
        $annunci = Annuncio::all();
        return view('admin.annunci.index', compact('annunci'));
    }

    public function recensioni(){
        $recensioni = Recensione::all();
        return view('admin.recensioni.index', compact('recensioni'));
    }

    
}
