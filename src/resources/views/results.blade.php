@extends('layouts.template')
@section('title', 'Golden Garage - Ricerca')
@section('content')
    <div class="container-fluid" style="padding-top:60px">
        <div class="row">

            <h1 class="text-center">Risultati della ricerca ({{ $annunci->count() }} risultato/i)</h1>


            <div class="col-2">
                <p class="text-center">Ricerca Veicoli</p>
                <div class="container border card-header">
                    <form action="{{ route('results') }}" method="get" enctype="multipart/form-data">
                        <div id="form1" class="">
                            @csrf
                            <div class="text-center mb-3">
                                <h5>Stato Veicolo</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stato" id="inlineRadio1"
                                        value="nuovo">
                                    <label class="form-check-label" for="inlineRadio1">Nuovo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stato" id="inlineRadio2"
                                        value="usato">
                                    <label class="form-check-label" for="inlineRadio2">Usato</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="regione">
                                    <h5>Regione</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="regione"
                                    id="regione" onchange="mostraprovince()">
                                    <option></option>
                                    @for ($i = 0; $i < count($regioni); $i++)
                                        <option value="{{ $regioni[$i]->regione }}" name="regione">
                                            {{ $regioni[$i]->regione }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-check-label" for="provincia">
                                    <h5>Provincia</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="provincia"
                                    id="provincia" onchange="mostracomuni()">

                                </select>
                            </div>
                            <div class="col">
                                <label class="form-check-label" for="comune">
                                    <h5>Comune</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="comune"
                                    id="comune">

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="marca">
                                    <h5>Marca</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="marca" id="marca"
                                    onchange="mostramodelli()">
                                    <option></option>
                                    @foreach ($marche as $marca)
                                        <option value="{{ $marca->id }}" name="marca">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-check-label" for="modello">
                                    <h5>Modello</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="modello"
                                    id="modello"></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="alimentazione">
                                    <h5>Alimentazione</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="alimentazione"
                                    id="alimentazione">
                                    <option></option>
                                    <option value="benzina" name="alimentazione">Benzina</option>
                                    <option value="diesel" name="alimentazione">Diesel</option>
                                    <option value="metano" name="alimentazione">Metano</option>
                                    <option value="gpl" name="alimentazione">Gpl</option>
                                    <option value="elettrica" name="alimentazione">Elettrica</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="potenza">
                                    <h5>Potenza: a partire da</h5>
                                </label>
                                <input type="range" name="potenza" min="50" max="500" value="0"
                                    onchange="potenzavalue(this.value);">
                                <input type="text" id="potenza" value="" disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="rivestimenti">
                                    <h5>Rivestimenti</h4>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="rivestimenti"
                                    id="rivestimenti">
                                    <option></option>
                                    <option value="pelle" name="rivestimenti">Pelle</option>
                                    <option value="tessuto" name="rivestimenti">Tessuto</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-check-label" for="cambio">
                                    <h5>Cambio</h5>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="cambio"
                                    id="cambio">
                                    <option></option>
                                    <option value="manuale" name="cambio">Manuale</option>
                                    <option value="automatico" name="cambio">Automatico</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-check-label" for="cilindrata">
                                    <h5>Cilindrata: a partire da</h5>
                                </label>
                                <input type="range" name="cilindrata" min="1200" max="6000" value="0"
                                    onchange="cilindratavalue(this.value);">
                                <input type="text" id="cilindrata" value="" disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h5>Prezzo da:</h5>
                                <input type="text" name="prezzo_da" class="form-control">
                            </div>
                            <div class="col">
                                <h5>a:</h5>
                                <input type="text" name="prezzo_a" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h5>Anno da:</h5>
                                <input type="text" name="anno_da" class="form-control">
                            </div>
                            <div class="col">
                                <h5>a:</h5>
                                <input type="text" name="anno_a" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h5>Km da:</h5>
                                <input type="text" name="km_da" class="form-control">
                            </div>
                            <div class="col">
                                <h5>a:</h5>
                                <input type="text" name="km_a" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <input type="submit" name="Cerca" class="btn btn-success" value="Cerca" />
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-9">

                @foreach ($annunci as $annuncio)
                    <div class="card my-4 mx-5" style="max-width: 100%;">

                        <div class="card-header d-flex justify-content-center">
                            <p><b>
                                    <h4>
                                        <a href="{{ route('annunci.show', $annuncio->id) }}">
                                            {{ $annuncio->modelli->marche->nome }}
                                            {{ $annuncio->modelli->nome }}
                                        </a>
                                    </h4>
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
                                            <p class="card-text">Alimentazione: {{ $annuncio->alimentazione }}
                                            </p>
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
                            si trova a {{ $annuncio->comuni->comune }}, {{ $annuncio->comuni->provincia }},
                            {{ $annuncio->comuni->regione }}
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div class="col d-flex justify-content-center">
            @php
                $url = $_SERVER['REQUEST_URI'];   
            @endphp
            {{ $annunci->withPath($url) }}
        </div>
    </div>
    

@endsection



<script>
    function mostramodelli() {
        const id = document.getElementById('marca').value;
        fetch(`/annuncimodelli/${id}`)
            .then(response => {
                return response.json();
            })
            .then(modelli => {
                document.getElementById('modello').innerHTML = '';
                document.getElementById('modello').innerHTML = '<option></option>';
                for (let i = 0; i < modelli.length; i++) {
                    document.getElementById('modello').innerHTML += `
                            <option value="${modelli[i].id }" name="modello">${modelli[i].nome}</option>
                        `;
                }
            });
    }

    function form2() {
        document.getElementById('form1').classList.add("d-none");
        document.getElementById('btn1').classList.add("d-none");
        document.getElementById('form2').classList.remove("d-none");
        document.getElementById('back').classList.remove("d-none");
    }

    function form1() {
        event.preventDefault();
        document.getElementById('form1').classList.remove("d-none");
        document.getElementById('btn1').classList.remove("d-none");
        document.getElementById('form2').classList.add("d-none");
        document.getElementById('back').classList.add("d-none");
    }


    function mostraprovince() {
        const regione = document.getElementById('regione').value;
        fetch(`/provincia/${regione}`)
            .then(response => {
                return response.json();
            })
            .then(province => {
                document.getElementById('provincia').innerHTML = '';
                document.getElementById('provincia').innerHTML = '<option></option>';
                for (let i = 0; i < province.length; i++) {
                    document.getElementById('provincia').innerHTML += `
                        <option value="${province[i].provincia}" name="provincia">${province[i].provincia}</option>`;
                }
            });
    };

    function mostracomuni() {
        const provincia = document.getElementById('provincia').value;
        fetch(`/comune/${provincia}`)
            .then(response => {
                return response.json();
            })
            .then(comuni => {
                document.getElementById('comune').innerHTML = '';
                document.getElementById('comune').innerHTML = '<option></option>';
                for (let i = 0; i < comuni.length; i++) {
                    document.getElementById('comune').innerHTML += `
                        <option value="${comuni[i].id}" name="comune">${comuni[i].comune}</option>`;
                }
            });
    };

    function potenzavalue(val) {
        document.getElementById('potenza').value = val + ' Cv';
    }

    function cilindratavalue(val) {
        document.getElementById('cilindrata').value = val + ' cc';
    }
</script>
