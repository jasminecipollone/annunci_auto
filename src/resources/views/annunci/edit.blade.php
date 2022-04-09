@extends('layouts.template')
@section('title', 'Golden Garage - Modifica veicolo')
@section('content')
<div class="container" style="padding-top:80px">
    <h1 class="text-center">Modifica del tuo annuncio</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


        <form action="{{ route('annunci.update', $annuncio->id) }}" method="post" enctype="multipart/form-data">
            <div id="form1" class="">
            @csrf
            <div class="text-center mb-3">
              <h4>Stato Veicolo</h4>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="stato" id="inlineRadio1" value="nuovo">
                  <label class="form-check-label" for="inlineRadio1">Nuovo</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="stato" id="inlineRadio2" value="usato">
                  <label class="form-check-label" for="inlineRadio2">Usato</label>
              </div>
          </div>

          <div class="row">
            <div class="col">
              <label class="form-check-label" for="regione"><h4>Regione</h4></label>
              <select class="form-select" aria-label="Default select example" name="regione" id="regione" onchange="mostraprovince()">
                <option>Regione</option>
                <option selected> {{$annuncio->comuni->regione}} </option>
                  @for ($i = 0; $i < count($regioni); $i++)
                    <option value="{{$regioni[$i]->regione}}" name="regione">{{$regioni[$i]->regione}}</option>
                  @endfor
              </select>
            </div>
            <div class="col">
              <label class="form-check-label" for="provincia"><h4>Provincia</h4></label>
              <select class="form-select" aria-label="Default select example" name="provincia" id="provincia" onchange="mostracomuni()">
                  <option selected> {{$annuncio->comuni->provincia}} </option>
              </select>
            </div>
            <div class="col">
              <label class="form-check-label" for="comune"><h4>Comune</h4></label>
              <select class="form-select" aria-label="Default select example" name="comune" id="comune">
                  <option selected value="{{ $annuncio->comune_id }}"> {{$annuncio->comuni->comune}} </option>
              </select>
            </div>
          </div>
            
          <div class="row">
              <div class="col">
                <label class="form-check-label" for="marca"><h4>Marca</h4></label>
                <select class="form-select" aria-label="Default select example" name="marca" id="marca" onchange="mostramodelli()">
                    <option>Marca</option>
                    <option selected> {{$annuncio->modelli->marche->nome}} </option>
                    @foreach ($marche as $marca)
                        <option value="{{ $marca->id }}" name="marca">{{ $marca->nome }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col">
                <label class="form-check-label" for="modello"><h4>Modello</h4></label>
                <select class="form-select" aria-label="Default select example" name="modello" id="modello">
                  <option selected value="{{ $annuncio->modello_id}}"> {{ $annuncio->modelli->nome }} </option>
                </select>
              </div>
          </div>

          <div class="row">
            <div class="col">
              <h4>Prezzo</h4>
              <input type="text" name="prezzo" class="form-control" value="{{ $annuncio->prezzo }}"/>
          </div>
            <div class="col">
              <h4>Chilometraggio</h4>
              <input type="text" name="chilometraggio" class="form-control" value="{{ $annuncio->chilometraggio }}"/>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <h4>Immatricolazione</h4>
              <input type="date" name="immatricolazione" class="form-control" value="{{ $annuncio->immatricolazione }}"/>
            </div>
            <div class="col">
              <h4>Potenza</h4>
              <input type="text" name="potenza" class="form-control" value="{{ $annuncio->potenza }}"/>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <h4>Cilindrata</h4>
              <input type="text" name="cilindrata" class="form-control" value="{{ $annuncio->cilindrata }}"/>
            </div>
            <div class="col">
              <h4>Colore</h4>
              <input type="text" name="colore" class="form-control" value="{{ $annuncio->colore }}"/>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label class="form-check-label" for="alimentazione"><h4>Alimentazione</h4></label>
                <select class="form-select" aria-label="Default select example" name="alimentazione" id="alimentazione">
                    <option selected value ="{{$annuncio->alimentazione}}"> {{ $annuncio->alimentazione }} </option>
                    <option value="benzina" name="alimentazione">Benzina</option>
                    <option value="diesel" name="alimentazione">Diesel</option>
                    <option value="metano" name="alimentazione">Metano</option>
                    <option value="gpl" name="alimentazione">Gpl</option>
                    <option value="elettrica" name="alimentazione">Elettrica</option>
                </select>
            </div>
            <div class="col">
              <h4>Carrozzeria</h4>
              <input type="text" name="carrozzeria" class="form-control" value="{{ $annuncio->carrozzeria }}"/>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <h4>Descrizione</h4>
              <input type="textarea" name="descrizione" class="form-control" value="{{ $annuncio->descrizione }}"/>
            </div>
            <div class="col">
              <h4>Indirizzo</h4>
              <input type="text" name="indirizzo" class="form-control" value="{{ $annuncio->indirizzo }}"/>
            </div>
          </div>
            <br>
        </div>

        <div id="form2" class="d-none">

          <div class="row">
            <div class="col">
              <h4>Proprietari</h4>
              <input type="text" name="proprietari" class="form-control" value="{{ $annuncio->dettagli->proprietari }}"/>
            </div>
            <div class="col">
              <label class="form-check-label" for="cambio"><h4>Cambio</h4></label>
                <select class="form-select" aria-label="Default select example" name="cambio" id="cambio">
                    <option selected value="{{ $annuncio->dettagli->cambio }}">{{ $annuncio->dettagli->cambio }}</option>
                    <option value="manuale" name="cambio">Manuale</option>
                    <option value="automatico" name="cambio">Automatico</option>
                </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <h4>Vernice</h4>
              <input type="text" name="vernice" class="form-control" value="{{ $annuncio->dettagli->vernice }}"/>
            </div>
            <div class="col">
              <label class="form-check-label" for="rivestimenti"><h4>Rivestimenti</h4></label>
                <select class="form-select" aria-label="Default select example" name="rivestimenti" id="rivestimenti">
                    <option selected value={{ $annuncio->dettagli->rivestimenti }}>{{ $annuncio->dettagli->rivestimenti }}</option>
                    <option value="pelle" name="rivestimenti">Pelle</option>
                    <option value="tessuto" name="rivestimenti">Tessuto</option>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <h4>Posti</h4>
              <input type="text" name="posti" class="form-control" value="{{ $annuncio->dettagli->posti }}"/>
            </div>
            <div class="col">
              <h4>Porte</h4>
              <input type="text" name="porte" class="form-control" value="{{ $annuncio->dettagli->porte }}"/>
            </div>
          </div>
            
          <div class="row">
            <div class="col">
              <h4>Consumi</h4>
              <input type="text" name="consumi" class="form-control" value="{{ $annuncio->dettagli->consumi }}"/>
            </div>
            <div class="col">
              <h4>Emissioni</h4>
              <input type="text" name="emissioni" class="form-control" value="{{ $annuncio->dettagli->emissioni }}"/>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col">
              <label for="immagine" class="form-label">Seleziona una Foto</label>
              <input class="form-control" type="file" id="immagine" name="immagine">
            </div>
          </div>
          
          <hr class="my-5">
          <h2 class="text-center my-3">Equipaggiamento</h2>

          <div class="container">
            <div class="row">
              <div class="col">
                <h4>Comodità</h4>
              
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="alzacristalli" id="alzacristalli">
                  <label class="form-check-label" for="alzacristalli">
                      Alzacristalli elettrici
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="clima" id="clima" Default>
                  <label class="form-check-label" for="clima">
                      Climatizzatore
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="autoclima" id="autoclima" Default>
                  <label class="form-check-label" for="autoclima">
                      Controllo automatico clima
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="specchietti" id="specchietti" Default>
                  <label class="form-check-label" for="specchietti">
                      Specchietti laterali elettrici
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="volantepelle" id="volantepelle" Default>
                  <label class="form-check-label" for="volantepelle">
                      Volante in pelle
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="volantemulti" id="volantemulti" Default>
                  <label class="form-check-label" for="volantemulti">
                      Volante multifunzione
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="cbordo" id="cbordo" Default>
                  <label class="form-check-label" for="cbordo">
                      Computer di bordo
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="lega" id="lega" Default>
                  <label class="form-check-label" for="lega">
                      Cerchi in lega
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="luci" id="luci" Default>
                  <label class="form-check-label" for="luci">
                      Luce d'ambiente
                  </label>
                </div>
            </div>

              <div class="col">
                <h4>Sicurezza</h4>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="ruota" id="ruota" Default>
                  <label class="form-check-label" for="ruota">
                      Ruota di scorta
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="abs" id="abs" Default>
                  <label class="form-check-label" for="abs">
                      ABS
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="antifurto" id="antifurto" Default>
                  <label class="form-check-label" for="antifurto">
                      Antifurto
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="airbagc" id="airbagc" Default>
                  <label class="form-check-label" for="airbagc">
                      Airbag conducente
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="airbagp" id="airbagp" Default>
                  <label class="form-check-label" for="airbagp">
                      Airbag passeggero
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="airbagl" id="airbagl" Default>
                  <label class="form-check-label" for="airbagl">
                      Airbag laterali
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="immobilizzatore" id="immobilizzatore" Default>
                  <label class="form-check-label" for="immobilizzatore">
                      Immobilizzatore elettronico
                  </label>
                </div>

              </div>

              <div class="col">
                <h4>Tecnologia</h4>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="chiusurac" id="chiusurac" Default>
                  <label class="form-check-label" for="chiusurac">
                      Chiusura centralizzata
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="trazione" id="trazione" Default>
                  <label class="form-check-label" for="trazione">
                      Controllo automatico trazione
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="fendinebbia" id="fendinebbia" Default>
                  <label class="form-check-label" for="fendinebbia">
                     Fendinebbia
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="frenata" id="frenata" Default>
                  <label class="form-check-label" for="frenata">
                      Frenata d'emergenza assistita
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="servosterzo" id="servosterzo" Default>
                  <label class="form-check-label" for="servosterzo">
                      Servosterzo
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pressione" id="pressione" Default>
                  <label class="form-check-label" for="pressione">
                      Sistema di controllo pressione pneumatici
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="esp" id="esp" Default>
                  <label class="form-check-label" for="esp">
                      ESP
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="corsia" id="corsia" Default>
                  <label class="form-check-label" for="corsia">
                      Mantenimento di corsia
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="autonoma" id="autonoma" Default>
                  <label class="form-check-label" for="autonoma">
                      Guida autonoma
                  </label>
                </div>

              </div>

            </div>
          </div>

          <br>
            
          <button class="btn btn-secondary d-none" id="back" onclick="form1()">Indietro</button>
          <input type="submit" name="Invia" class="btn btn-danger" value="Modifica Annuncio"/>
          <hr class="my-5">
        </div>  
        </form>
        
        <input type="submit" name="Continua" onclick="form2()" id="btn1" class="btn btn-danger" value="Continua"/>
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
            document.getElementById('modello').innerHTML = '<option>Modello</option>';
            for ( let i = 0; i < modelli.length; i++) { 
                document.getElementById('modello').innerHTML += `
                    <option value="${modelli[i].id }" name="modello">${modelli[i].nome}</option>
                ` ;
            }
        });
    }

    function form2(){
            document.getElementById('form1').classList.add("d-none");
            document.getElementById('btn1').classList.add("d-none");
            document.getElementById('form2').classList.remove("d-none");
            document.getElementById('back').classList.remove("d-none");
        }
    function form1(){
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
            document.getElementById('provincia').innerHTML = '<option>Provincia</option>';
            for (let i = 0; i < province.length; i++){
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
            document.getElementById('comune').innerHTML = '<option>Comune</option>';
            for (let i = 0; i < comuni.length; i++){
              document.getElementById('comune').innerHTML += `
                <option value="${comuni[i].id}" name="comune">${comuni[i].comune}</option>`;
            }         
        });
      };

</script>