@extends('layouts.template')
@section('content')
    <div class="container" style="margin-top:80px">
        <h1 class="text-center"> {{ $annuncio->modelli->marche->nome }} {{ $annuncio->modelli->nome }} </h1>

        <div class="row">
            <div class="col">
                <h5>Venduto da {{ $annuncio->user->name }} </h5>
            </div>
            <div class="col text-end">
                <h5>{{ $annuncio->comuni->comune }}, {{ $annuncio->comuni->provincia }},
                    {{ $annuncio->comuni->regione }}
                </h5>
            </div>
        </div>

        <hr>

        <div class="row mt-3">
            <img src="/storage/immagini/{{ $annuncio->immagine }}" class="img-fluid">
        </div>

        <hr>

        <div class="row">
            <div class="col d-flex align-items-center">
                <h5> In vendita dal: {{ \Carbon\Carbon::parse($annuncio->created_at)->format('d-m-Y') }} </h5>
            </div>
            <div class="col text-end">
                <h2><b>{{ $annuncio->prezzo }} €</b></h2>
            </div>
        </div>

        <hr>

        <div class="row">
            <h3>Dati Principali</h3>

            <div class="col">
                <p><b>Tipo di Veicolo</b></p>
                <p>Stato: {{ $annuncio->stato }}</p>
                <p>Chilometraggio: {{ $annuncio->chilometraggio }} Km</p>
                @php
                    if (!empty($annuncio->dettagli->proprietari)) {
                        echo '<p>Proprietari: ' . $annuncio->dettagli->proprietari . '</p>';
                    }
                @endphp

                <br>
                <p><b>Motore e Trazione</b></p>
                @php
                if (!empty($annuncio->dettagli->cambio)) {
                        echo '<p>Tipo di Cambio: ' . $annuncio->dettagli->cambio . '</p>';
                    }
                @endphp
                <p>Cilindrata: {{ $annuncio->cilindrata }} cc</p>
                <p>Potenza: {{ $annuncio->potenza }} cv</p>

                <br>
                <p><b>Ambiente</b></p>
                <p>Alimentazione: {{ $annuncio->alimentazione }}</p>
                @php
                    if (!empty($annuncio->dettagli->consumi)) {
                        echo '<p>Consumi: ' . $annuncio->dettagli->consumi . '</p>';
                    }
                    if (!empty($annuncio->dettagli->emissioni)) {
                        echo '<p>Emissioni: ' . $annuncio->dettagli->emissioni . '</p>';
                    }
                @endphp
            </div>
            <div class="col">
                <p><b>Caratteristiche</b></p>
                <p>Marca: {{ $annuncio->modelli->marche->nome }}</p>
                <p>Modello: {{ $annuncio->modelli->nome }}</p>
                <p>Anno: {{ explode('-', $annuncio->immatricolazione)[0] }}</p>
                <p>Colore esterno: {{ $annuncio->colore }}</p>
                <p>Carrozzeria: {{ $annuncio->carrozzeria }}</p>
                @php
                if (!empty($annuncio->dettagli->vernice)) {
                    echo '<p>Vernice: ' . $annuncio->dettagli->vernice . '</p>';
                }
                if (!empty($annuncio->dettagli->rivestimenti)) {
                    echo '<p>Rivestimenti: ' . $annuncio->dettagli->rivestimenti . '</p>';
                }
                if (!empty($annuncio->dettagli->porte)) {
                    echo '<p>Porte: ' . $annuncio->dettagli->porte . '</p>';
                }
                if (!empty($annuncio->dettagli->posti)) {
                    echo '<p>Posti a sedere: ' . $annuncio->dettagli->posti . '</p>';
                }
                @endphp
            </div>
        </div>

        <hr>

        <div class="row">
            <h3>Descrizione</h3>
            <p> {{ $annuncio->descrizione }}</p>

            <p>Visionabile al seguente indirizzo: {{ $annuncio->indirizzo }}</p>
        </div>

        <hr>

        <div class="row">
            <h3>Equipaggiamento</h3>

        </div>






    </div>
@endsection
