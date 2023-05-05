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
    <h1 style="text-align: center;">TAMBAH INSTRUKTUR</h1>
    <form action="/instructors/add" method="post">
        @csrf

        <label for="inputName">Username<span class="text-danger"></span></label><br>
                <input type="text" id="inputName" name="username" class="w-100"><br>
                @if ($errors->has('inputName'))
                    <span class="error">{{ $errors->first('inputName') }}</span>
                @endif

                <label for="inputEmail">Email<span class="text-danger"></span></label><br>
                <input type="text" id="inputEmail" name="email" class="w-100"><br>
                @if ($errors->has('inputEmail'))
                    <span class="error">{{ $errors->first('inputEmail') }}</span>
                @endif

                <label for="inputPass">Password<span class="text-danger"></span></label><br>
                <input type="password" id="inputPass" name="password" class="w-100" ><br>
                @if ($errors->has('passInput'))
                    <span class="error">{{ $errors->first('passInput') }}</span>
                @endif

                <label for="inputPhone">Phone Number<span class="text-danger"></span></label><br>
                <input type="text" id="inputPhone" name="phone" class="w-100" ><br>
                @if ($errors->has('inputPhone'))
                    <span class="error">{{ $errors->first('inputPhone') }}</span>
                @endif

                <label for="inputAddress">Address<span class="text-danger"></span></label><br>
                <input type="text" id="inputAddress" name="address" class="w-100" ><br>
                @if ($errors->has('inputAddress'))
                    <span class="error">{{ $errors->first('inputAddress') }}</span>
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