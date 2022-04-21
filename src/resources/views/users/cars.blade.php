@extends('layouts.template')
@section('title', 'Golden Garage - Le nostre auto')
@section('content')
    <div class="container-fluid" style="padding-top:60px">
        <div class="row d-flex justify-content-center">
            <h1 class="text-center mt-3">Vetture in vendita di: {{ $annunci[0]->user->name}}</h1>

            <div class="col-9">

                @foreach ($annunci as $annuncio)
                    <div class="card my-4 mx-5" style="max-width: 100%;">

                        <div class="card-header d-flex justify-content-center">
                            <p><b>
                                    <h4><a href="{{ route('annunci.show', $annuncio->id) }}">
                                            {{ $annuncio->modelli->marche->nome }}
                                            {{ $annuncio->modelli->nome }}</a>
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


                        <div class="card-footer d-flex justify-content-end ">
                            Inserito da {{ $annuncio->user->name }} il
                            {{ \Carbon\Carbon::parse($annuncio->created_at)->format('d-m-Y') }} ,
                            si trova a {{ $annuncio->comuni->comune }}, {{ $annuncio->comuni->provincia }},
                            {{ $annuncio->comuni->regione }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col d-flex justify-content-center">
        {{ $annunci->links() }}
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
