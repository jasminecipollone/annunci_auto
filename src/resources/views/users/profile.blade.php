@extends('layouts.template')
@section('title', 'Golden Garage - User Profile')
@section('content')

<style>


</style>
<div class="container" style="margin-top:80px">

    <h1>Profilo di {{ $user->name }}</h1>
    <hr>
    <p>Utente di Golden Garage dal: {{ $user->created_at }}</p>
    <p>Ha venduto un totale di {{ $vendute }} auto.</p>
    <p>Ha attualmente un totale di {{ $nonvendute }} auto in vendita.</p>
    <p>Media recensioni di: {{ round($media,2) }}/5</p>
    <hr>
    <h1>Feedback di {{ $user->name }}</h1>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Inserita da</th>
                    <th scope="col">Inserita il</th>
                    <th scope="col">Recensione</th>
                    <th scope="col">Valutazione</th>
                    <th> </th>
                </tr>
            </thead>
            @foreach ($recensioni as $recensione)
                <tr>
                    <td>{{ $recensione->user_name_who}}</td>
                    <td>{{ $recensione->created_at }}</td>
                    <td>{{ $recensione->commento }}</td>
                    <td>
                        @php
                            $stars = '';
                            for ($i = 0; $i < $recensione->valutazione; $i++){
                                $stars .='<i class="fa-solid fa-star" style="color:yellow"></i>';
                            }
                            echo $stars;
                        @endphp
                    </td>
                    <td>
                        @if ($recensione->user_id_who == Auth::id())
                        <form method="post" action={{ route('recensioni.destroy', $recensione->id) }}>
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            
        </table>
        <div class="col d-flex justify-content-center">
            {{ $recensioni->links() }}
        </div>
    </div>

    <hr>
    @if(Session::has('msg'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('msg') }}
    </div>
    @endif

    @auth
    @if (!(Auth::id() == $user->id))
    <h2>Inserisci una recensione per {{ $user->name }}</h2>
    <form method="post" action=" {{ route('recensioni.store') }} ">
        @csrf
        <div class="mb-3">
            
            <div class="row">
                <p>Valutazione</p>
                <div class="d-flex mb-3" style="gap: 8px">
                <i class="fa-solid fa-star stella" style="cursor:pointer"></i>
                <i class="fa-solid fa-star stella" style="cursor:pointer"></i>
                <i class="fa-solid fa-star stella" style="cursor:pointer"></i>
                <i class="fa-solid fa-star stella" style="cursor:pointer"></i>
                <i class="fa-solid fa-star stella" style="cursor:pointer"></i>
                </div>
            </div>
            <div class="row">
                <label for="exampleInputEmail1" class="form-label">Recensione</label>
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <input type="hidden" name="valutazione" id="valutazione" value="" />
                <input type="text" class="form-control" id="exampleInputEmail1" name="commento" aria-describedby="emailHelp">
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Invia</button>
    </form>
    <br>

    
</div>


<script>

const stars = document.querySelectorAll('.stella');

stars.forEach((star, index) => {
    star.addEventListener('click', ()=>{
        
        for(let i = 0; i < stars.length; i++){
            stars[i].style.color = 'black';
        }

        console.log(`Hai cliccato la stella ${index + 1}`);

        for(let i = 0; i <= index; i++){
            stars[i].style.color = 'yellow';
        }

        document.getElementById('valutazione').value = index + 1;
    })

});



</script>
@endif
@endauth

@endsection