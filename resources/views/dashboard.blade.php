@extends('layout.FullPage')

<style>
    #layout {
        display: flex;
        margin: 10px 10%;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: row;
    }

    #layout div {
        max-width: 300px;
    }

    .container p {
        padding: 10px;
        font-weight: bold;
        font-size: 2rem;
        text-align: center;
    }

    .container a {
        display: flex;
        background-color: white;
        width: 100%;
        margin-bottom: 10px;
        text-decoration: none;
        color: black;
        padding: 5px;
    }
</style>

@section('content')
    <div>
    <h1 style="margin-top: 45vh; color:yellow; text-align: center; font-weight: bold">GOFIT GYM </h1>
    <h1 style="margin-top: 3vh; color:yellow; text-align: center; font-weight: bold"> Solusi Anda Berolahraga</h1>
    </div>
@endsection