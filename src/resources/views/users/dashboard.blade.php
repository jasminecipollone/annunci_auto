@extends('layouts.template')
@section('content')
<div class="container" style="padding-top:80px">
    @auth
    <h1 class="text-left">Benvenuto, {{ Auth::user()->name }} </h1>
    @endauth
    <div class="container my-3">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('user.mycars') }}'">Le mie auto in vendita</button>
        <button type="button" class="btn btn-outline-dark" onclick="window.location='{{ route('user.carssold') }}'">Le mie auto vendute</button>
        <button type="button" class="btn btn-outline-secondary">Le mie recensioni</button>
        <button type="button" class="btn btn-outline-success">Il mio profilo</button>
        <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('user.mystats') }}'">Le mie statistiche</button>
        <button type="button" class="btn btn-outline-warning" onclick="window.location='{{ route('annunci.index') }}'">Visiona gli annunci</button>
        <button type="button" class="btn btn-outline-info" onclick="window.location='{{ route('annunci.create') }}'">Inserisci annuncio</button>
    </div>

</div>

</div>

@endsection

