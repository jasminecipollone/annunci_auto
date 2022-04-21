@extends('layouts.template')
@section('title', 'Golden Garage - Le mie statistiche')
@section('content')
<div class="container" style="padding-top:80px">
    @auth
    <h1 class="text-left">Benvenuto, {{ Auth::user()->name }} </h1>
    @endauth
    <div class="container my-3">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('user.mycars') }}'">Le mie auto in vendita</button>
        <button type="button" class="btn btn-outline-dark" onclick="window.location='{{ route('user.carssold') }}'">Le mie auto vendute</button>
        <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ route('users.profile', Auth::user()->id) }}'">Le mie recensioni</button>
        <button type="button" class="btn btn-outline-success" onclick="window.location='{{ route('users.edit', Auth::user()->id) }}'">Il mio profilo</button>
        <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('user.mystats') }}'">Le mie statistiche</button>
        <button type="button" class="btn btn-outline-warning" onclick="window.location='{{ route('annunci.index') }}'">Visiona gli annunci</button>
        <button type="button" class="btn btn-outline-info" onclick="window.location='{{ route('annunci.create') }}'">Inserisci annuncio</button>
    </div>  

    <div class="container">

        <h1>Le mie statistiche di vendita</h1>

        <hr>

        <div class="row">
            <p>Auto vendute : {{$vendute}}</p>
            <p>Incassi tramite la nostra piattaforma: {{$prezzov}} €</p>
        </div>
        
        <hr>
        
        <div class="row">
            <p>Auto in vendita : {{$vendita}}</p>
            <p>Totale dei veicoli che hai in vendita: {{$prezzon}} €</p>

        </div>  

    </div>

</div>

@endsection