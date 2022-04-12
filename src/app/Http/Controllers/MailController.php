<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Annuncio;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function info($id, Request $request){
        //dd($request);
        $annuncio = Annuncio::find($id);
        $proprietario = $request->proprietario;
        $interessato = $request->interessato;
        $info = $request->info;

        $nomeproprietario = User::select('name')->where('email', $proprietario)->first()->name;

        Mail::send('mail.info',
        array(
            'interessato' => $interessato,
            'nome' => $nomeproprietario,
            'annuncio' => $annuncio,
            'user_message' => $info,
        ), function($message) use ($request)
          {
             $message->from($request->interessato);
             $message->to($request->proprietario);
             $message->subject('Info Macchina');
          });

        return back()->with('msg', 'Email inviata con successo!');
    }


}
