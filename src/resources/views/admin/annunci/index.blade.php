@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Tutti gli annunci</h1>
@stop


@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('msg') }}
        </div>
    @endif
    <table class="table table-bordered table-striped datat">
        <thead>
            <th>ID</th>
            <th>Titolo</th>
            <th>Creato il:</th>
            <th>Da</th>
            <th>Venduta</th>
            <th>Elimina Veicolo</th>
            <th>Imposta come Venduto</th>
            <th>Rimetti in Vendita</th>
        </thead>
        @foreach ($annunci as $annuncio)
            <tr>
                <td>{{ $annuncio->id }}</td>
                <td>{{ $annuncio->modelli->marche->nome }} {{ $annuncio->modelli->nome}}</td>
                <td>{{ $annuncio->created_at }}</td>
                <td>{{ $annuncio->user->name }}</td>
                <td>{{ $annuncio->venduta ? 'YES' : 'NO' }}</td>
                <td> <a class="btn btn-danger" href="{{ route('annunci.remove',$annuncio->id)}}">Elimina Definitivamente</a></td>
                <td> <a class="btn btn-warning" href="{{ route('annunci.destroy',$annuncio->id)}}">Imposta come Venduto</a></td>
                <td> <a class="btn btn-info" href="{{ route('user.return',$annuncio->id) }}">Rimetti in Vendita</a></td>
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
    Powered by Infobasic
@stop
