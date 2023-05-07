@extends('layout/FullPage')
<style>
    #layout {
        display: flex;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        height: 95%;
        background-color: #ffdf80;
    }
</style>

@section('content')
    <section id="layout">
        <h1 style="text-align: center;">EDIT MEMBER</h1>
        <form action="/members/update/{{ $member->id }}" method="post">
            @csrf

            <label for="inputName">Username</label><br>
            <input type="text" id="inputName" name="username" class="w-100" value="{{ $member->username }}" readonly><br>
            @if ($errors->has('inputName'))
                <span class="error">{{ $errors->first('inputName') }}</span>
            @endif

            <label for="inputEmail">Email</label><br>
            <input type="text" id="inputEmail" name="email" class="w-100" value="{{ $member->email }}" readonly><br>
            @if ($errors->has('inputEmail'))
                <span class="error">{{ $errors->first('inputEmail') }}</span>
            @endif

            <label for="inputPhone">Phone Number</label><br>
            <input type="text" id="inputPhone" name="phone" class="w-100" value="{{ $member->phone }}"><br>
            @if ($errors->has('inputPhone'))
                <span class="error">{{ $errors->first('inputPhone') }}</span>
            @endif

            <label for="inputAddress">Address</label><br>
            <input type="text" id="inputAddress" name="address" class="w-100" value="{{ $member->address }}"><br>
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
