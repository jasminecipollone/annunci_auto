@extends('layouts.template')
@section('content')
    <style>
        /* Centered text */
        .main-page {
            height: 90vh;
            width: 100%;
            position: relative;
            background-image: url("img/index.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .centered {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Bottom left text */
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }

        img {

        }

    </style>
    <div class="main-page">
        <div class="centered">
            <h1 style="font-family: 'Gwendolyn', serif; font-size: 12rem; color: #8B0000;">Golden Garage</h1>
            <h4 class="text-center" style="font-family: 'Gwendolyn', serif; font-size: 5rem; color: #8B0000;">
              Buy your dream today
            </h4>
        </div>
        <div class="bottom-left"><a href="/annunci" class="btn btn-danger">Look at our Cars</a></div>
    </div>
@endsection
