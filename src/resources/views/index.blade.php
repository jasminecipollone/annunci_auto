@extends('layouts.template')
@section('title', 'Golden Garage')
@section('content')
    <style>
        /* Centered text */
        .main-page {
            height: 100vh;
            width: 100%;
            position: relative;
            background-image: url("img/index.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .centered {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        img {

        }

    </style>
    <div class="main-page">
        <div class="centered">
            <h1 style="font-family: 'Satisfy', serif; font-size: 10rem; color: white;">Golden Garage</h1>
            <h4 class="text-center" style="font-family: 'Satisfy', serif; font-size: 5rem; color: white;">
              Buy your dream today
            </h4>
        </div>
    </div>
@endsection
