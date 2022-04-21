@extends('layouts.template')
@section('title', 'Golden Garage - Le mie auto vendute')
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

    <h1>Le mie auto vendute</h1>
    <hr>
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif

    @foreach ($annunci as $annuncio)
            <div class="card my-4 mx-5" style="max-width: 100%;">

                <div class="card-header d-flex justify-content-center">
                    <p><b>
                            <h4><a href="{{ route('annunci.show', $annuncio->id) }}"> {{$annuncio->modelli->marche->nome}} {{ $annuncio->modelli->nome }}</a></h4>
                    </b></p>
                </div>

                <div class="row g-0">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="/storage/immagini/{{ $annuncio->immagine }}" class="img-fluid">
                    </div>
                    <div class="col-md-9 d-flex flex-column">
                        <h2 class="card-text px-3 mt-1"> <b> {{ $annuncio->prezzo }} €</b></h2>
                        <div style="display: flex; height: 100%;">
                            <div class="col-md-3">
                                <div class="card-body">
                                    <p class="card-text">{{ $annuncio->chilometraggio }} Km</p>
                                    <hr>
                                    <p class="card-text">Stato: {{ $annuncio->stato }}</p>
                                    <hr>
                                    <p class="card-text">Alimentazione: {{ $annuncio->alimentazione }}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card-body">
                                    <p class="card-text">Immatricolazione:
                                        {{ explode('-', $annuncio->immatricolazione)[1] }}/{{ explode('-', $annuncio->immatricolazione)[0] }}
                                    </p>
                                    <hr>
                                    @php
                                        if (!empty($annuncio->dettagli->proprietari)) {
                                            echo '<p class="card-text">Proprietari: ' . $annuncio->dettagli->proprietari . '</p><hr>';
                                        }
                                    @endphp
                                    
                                    @php
                                        if (!empty($annuncio->dettagli->consumi)) {
                                            echo '<p class="card-text">Consumi: ' . $annuncio->dettagli->consumi . '</p>';
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                    <p class="card-text">Potenza: {{ $annuncio->potenza }} cv</p>
                                    <hr>
                                    @php
                                        if (!empty($annuncio->dettagli->cambio)) {
                                            echo '<p class="card-text">Cambio: ' . $annuncio->dettagli->cambio . '</p><hr>';
                                        }
                                    @endphp
                                    
                                    <p class="card-text">Cilindrata: {{ $annuncio->cilindrata }} cc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    Inserito da {{ $annuncio->user->name }} il
                    {{ \Carbon\Carbon::parse($annuncio->created_at)->format('d-m-Y') }} , 
                    si trova a {{$annuncio->comuni->comune}}, {{$annuncio->comuni->provincia}}, {{$annuncio->comuni->regione}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('user.return',$annuncio->id) }}" class="btn btn-success">Rimetti in vendita</a>
                </div>

                <div class="col">
                    <a href="{{ route('user.removecar',$annuncio->id) }}" class="btn btn-danger">Elimina Definitivamente</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

    
    

    

</div>

</div>

@endsection