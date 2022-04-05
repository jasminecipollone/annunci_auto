@extends('layouts.template')
@section('content')
    <div class="container-fluid" style="padding-top:60px">
        <h1 class="text-center">Le nostre vetture</h1>

        @foreach ($annunci as $annuncio)
            <div class="card my-4 mx-5" style="max-width: 100%;">

                <div class="card-header d-flex justify-content-center">
                    <p><b>
                            <h4>{{$annuncio->modelli->marche->nome}} {{ $annuncio->modelli->nome }} </h4>
                    </b></p>
                </div>

                <div class="row g-0">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <img src="/img/mercedes-amg-gt-facelift.jpg" class="img-fluid">
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
                                    <p class="card-text">Proprietari: {{ $annuncio->proprietari}}</p>
                                    <hr>
                                    <p class="card-text">Consumi: {{ $annuncio->consumi }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                    <p class="card-text">Potenza: {{ $annuncio->potenza }}</p>
                                    <hr>
                                    <p class="card-text">Cambio: {{ $annuncio->cambio }}</p>
                                    <hr>
                                    <p class="card-text">Cilindrata: {{ $annuncio->cilindrata }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    Inserito da {{ $annuncio->user_id }} il
                    {{ \Carbon\Carbon::parse($annuncio->created_at)->format('d-m-Y') }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
