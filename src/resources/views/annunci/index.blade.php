@extends('layouts.template')
@section('content')
<div class="container-fluid" style="padding-top:60px">
    <h1 class="text-center">Le nostre vetture</h1>

    @foreach ($annunci as $annuncio)
        <div class="card my-4 mx-5" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/mercedes-amg-gt-facelift.jpg" class="img-fluid rounded-start"
                        style="height: 15vw; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $annuncio->titolo }}</h5>
                        <p class="card-text">{{ $annuncio->descrizione }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Inserito da {{ $annuncio->user_id}} il
                {{ \Carbon\Carbon::parse($annuncio->created_at)->format('d-m-Y') }}
            </div>
        </div>
    @endforeach
</div>
@endsection