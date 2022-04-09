@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Tutti i Post</h1>
@stop

@section('content')
    <table class="table table-bordered table-striped datat">
        <thead>
            <th>ID</th>
            <th>Titolo</th>
            <th>Creato il:</th>
            <th>Da</th>
            <th>Venduta</th>
        </thead>
        @foreach ($annunci as $annuncio)
            <tr>
                <td>{{ $annuncio->id }}</td>
                <td>{{ $annuncio->modelli->marche->nome }} {{ $annuncio->modelli->nome}}</td>
                <td>{{ $annuncio->created_at }}</td>
                <td>{{ $annuncio->user->name }}</td>
                <td>{{ $annuncio->venduta ? 'YES' : 'NO' }}</td>
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
