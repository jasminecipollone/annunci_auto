@extends('adminlte::page')

@section('title', 'Utenti')

@section('content_header')
    <h1>Tutti gli Utenti</h1>
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
            <th>Nome</th>
            <th>Email</th>
            <th>Permission</th>
            <th>Rendi Admin</th>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role ? 'YES' : 'NO' }}</td>
                <td> 
                    @if ($user->role == false)
                        <a href="{{ route('user.makeadmin',$user->id)}}" class="btn btn-warning">Rendi Admin</a>
                    @endif
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
    Powered by Infobasic
@stop
