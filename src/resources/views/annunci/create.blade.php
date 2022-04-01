@extends('layouts.template')
@section('content')
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Vendi il tuo Veicolo</h1>


        <form action="{{ route('annunci.store') }}" method="post" enctype="multipart/form-data">
            <div id="form1">
            @csrf
            <h4>Stato Veicolo</h4>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stato" id="inlineRadio1" value="nuovo">
                <label class="form-check-label" for="inlineRadio1">Nuovo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stato" id="inlineRadio2" value="usato">
                <label class="form-check-label" for="inlineRadio2">Usato</label>
            </div>
            <br>
            <label class="form-check-label" for="marca"><h4>Marca</h4></label>
            <select class="form-select" aria-label="Default select example" name="marca" id="marca" onchange="mostramodelli()">
                <option>Marca</option>
                @foreach ($marche as $marca)
                    <option value="{{ $marca->id }}" name="marca">{{ $marca->nome }}</option>
                @endforeach
            </select>
            <label class="form-check-label" for="marca"><h4>Modello</h4></label>
            <select class="form-select" aria-label="Default select example" name="modello" id="modello">
               
            </select>


            <h4>Prezzo</h4>
            <input type="text" name="prezzo" class="form-control" />

            <h4>Chilometraggio</h4>
            <input type="text" name="chilometraggio" class="form-control" />

            <h4>Immatricolazione</h4>
            <input type="date" name="immatricolazione" class="form-control" />

            <h4>Potenza</h4>
            <input type="text" name="potenza" class="form-control" />

            <h4>Cilindrata</h4>
            <input type="text" name="cilindrata" class="form-control" />

            <h4>Colore</h4>
            <input type="text" name="colore" class="form-control" />

            <h4>Alimentazione</h4>
            <input type="text" name="alimentazione" class="form-control" />

            <h4>Carrozzeria</h4>
            <input type="text" name="carrozzeria" class="form-control" />

            <h4>Descrizione</h4>
            <input type="textarea" name="descrizione" class="form-control" />

            <h4>Indirizzo</h4>
            <input type="text" name="indirizzo" class="form-control" />
            <br>
        </div>

        <div id="form2" class="d-none">

            <h4>Proprietari</h4>
            <input type="text" name="proprietari" class="form-control" />

            <h4>Cambio</h4>
            <input type="text" name="cambio" class="form-control" />

            <h4>Vernice</h4>
            <input type="text" name="vernice" class="form-control" />

            <h4>Rivestimenti</h4>
            <input type="text" name="rivestimenti" class="form-control" />

            <h4>Posti</h4>
            <input type="text" name="posti" class="form-control" />

            <h4>Porte</h4>
            <input type="text" name="porte" class="form-control" />

            <h4>Consumi</h4>
            <input type="text" name="consumi" class="form-control" />

            <h4>Emissioni</h4>
            <input type="text" name="emissioni" class="form-control" />

            <h4>Equipaggiamento</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Alzacristalli elettrici
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Climatizzatore
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Controllo automatico clima
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Specchietti laterali elettrici
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Volante in pelle
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Volante multifunzione
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Computer di bordo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Cerchi in lega
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Luce d'ambiente
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Ruota di scorta
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    ABS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Antifurto
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Airbag conducente
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Airbag passeggero
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Airbag laterali
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Chiusura centralizzata
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Controllo automatico trazione
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                   Fendinebbia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Frenata d'emergenza assistita
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Servosterzo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Sistema di controllo pressione pneumatici
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    ESP
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Immobilizzatore elettronico
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Mantenimento di corsia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" Default>
                <label class="form-check-label" for="flexCheckDefault">
                    Guida autonoma
                </label>
              </div>


            <br>
            <input type="submit" name="Invia" class="btn btn-danger" />
        </div>  

        </form>
        <input type="submit" name="Continua" onclick="form2()" id="btn1" class="btn btn-danger" />
</div>
@endsection


<script>
    function mostramodelli () {
        const id = document.getElementById('marca').value;
        fetch(`/annuncimodelli/${id}`)
        .then(response => {
            return response.json();
        }) 
        .then(modelli => { 
            document.getElementById('modello').innerHTML = '';
            for ( let i = 0; i < modelli.length; i++) { 
                console.log(modelli[i]);
                document.getElementById('modello').innerHTML += `
                    <option value="${modelli[i].id }" name="modello">${modelli[i].nome}</option>
                ` ;
            }
        });
    }

function form2(){
        document.getElementById('form1').style.display = "none";
        document.getElementById('btn1').classList.add("d-none");
        document.getElementById('form2').classList.remove("d-none");
    }
</script>