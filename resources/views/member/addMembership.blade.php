@extends('layout.FullPage')
<style>
    #layout {
        display: flex;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        width: 100%;
        height: 95%;
        background-image: url("assets/gymDashboard.jpg");
    }
</style>

@section('content')
    <section id="layout">
        <h1 style="text-align: center;">Pilih Paket Membership</h1>
        <form action="/members/membership/add/{{ $member->id }}" method="post">
            @csrf

            <input type="radio" id="price1" name="price" value="50000">
            <label for="price1">Rp 50.000,00 /bulan<span class="text-danger"></span></label><br>
            @if ($errors->has('price1'))
                <span class="error">{{ $errors->first('price1') }}</span>
            @endif

            <input type="radio" id="price2" name="price" value="500000">
            <label for="price2">Rp 500.000,00 /tahun<span class="text-danger"></span></label><br>
            @if ($errors->has('price2'))
                <span class="error">{{ $errors->first('price2') }}</span>
            @endif

            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button class="w-100 btn btn-success" type="submit">Submit</button>
        </form>
    </section>
@endsection
