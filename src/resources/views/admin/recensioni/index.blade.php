@extends('adminlte::page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('title', 'Recensioni')

@section('content_header')
    <h1>Tutte le recensioni</h1>
@stop


@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif
    <table class="table table-bordered table-striped datat">
        <thead>
            <th>ID Recensione</th>
            <th>Recensione Profilo</th>
            <th>Valutazione</th>
            <th>Commento</th>
            <th>Inserita da</th>
            <th>Inserita il</th>
            <th>Elimina la recensione</th>
        </thead>
        @foreach ($recensioni as $recensione)
            <tr>
                <td>{{ $recensione->id }}</td>
                <td>{{ $recensione->user->name }}</td>
                <td>
                    @php
                            $stars = '';
                            for ($i = 0; $i < $recensione->valutazione; $i++){
                                $stars .='<i class="fa-solid fa-star" style="color:yellow"></i>';
                            }
                            echo $stars;
                        @endphp
                </td>
                <td>{{ $recensione->commento }}</td>
                <td>{{ $recensione->user_name_who }}</td>
                <td>{{ $recensione->created_at }}</td>
                <td> 
                    <form method="post" action={{ route('recensioni.destroy', $recensione->id) }}>
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.datat').DataTable();
        });
    </script>
@stop


@section('footer')
<div class="conatiner mt-3">
    Powered by Infobasic
</div>
    
@stop
