@extends('layouts.template')
@section('title', 'Golden Garage - My Area')
@section('content')
<div class="container" style="padding-top:80px">
    @auth
    <h1 class="text-left">Benvenuto, {{ Auth::user()->name }} </h1>
      @if (Auth::user()->role == true)
        <a href="/admin" class="btn btn-info">Pannello Admin</a>
      @endif
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
    
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif

</div>

<div class="container my-5">
    <div class="card text-center">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>

</div>

<div class="container my-5">
  <div class="card text-center">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>

</div>

@endsection

