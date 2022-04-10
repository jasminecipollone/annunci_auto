 @extends('layouts.template')
 @section('title', 'Golden Garage - Modifica utente')
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
        <h1>Modifica utente</h1>
        <hr>
        
        <form method="post" action="{{ route('users.update',$user->id) }}">
        @csrf
            <div class="row my-3">
                <div class="col-4">
                    Nome
                </div>
                <div class="col-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <div class="col-4">
                    Email
                </div>
                <div class="col-4">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ $user->email }}"/>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row my-3">
                <div class="col-4">
                    Password
                </div>
                <div class="col-4">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  value=""/>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>    
            </div>


            <div class="col-4">
                <input type="submit" value="Aggiorna" class="btn btn-success" />
            </div>
        </form>
        <input type="button" value="Indietro" class="btn btn-warning" onclick="window.location='{{ route('dashboard') }}'"/>
        <button type="button" class="btn btn-danger" id="delete" onclick="confirm()">
            Elimina il mio account
        </button>
        <div id="confirm" class="my-5">

        </div>


    </div>



@endsection  


<script>
    
function confirm(){
    

    document.getElementById('confirm').innerHTML += `
        <p>Eliminando il tuo account eliminerai anche tutti gli annunci delle tue auto in vendita!</p>
        <p>Sicuro di voler procedere? </p>
        <button id="yes" class="btn btn-danger" onclick="window.location='{{ route('users.destroy', Auth::user()->id) }}'">Elimina</button>
        <button id="no" class="btn btn-success" onclick="confirmhide()">Non Eliminare</button>
    `;
}

function confirmhide() {
        document.getElementById('confirm').innerHTML = '';
    }



</script>