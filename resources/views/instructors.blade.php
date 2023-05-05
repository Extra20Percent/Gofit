@extends('layout.FullPage')
<style>
    #layout {
        display: flex;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        height: 95%;
    }

    #instructorlist tr:nth-child(even){background-color:  #ffdf80;}

    #instructorlist tr:nth-child(odd){background-color: #ffdf80;}

    #instructorlist th, #instructorlist td{
        border: 1px solid white;
        padding: 8px;
    }

    #instructorlist {
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #instructorlist th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(44, 44, 44);
        color: white;
    }
</style>

@section('content')
<section id="layout">
    <h1 style="text-align: center; color:white;">INSTRUKTUR</h1>
    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
        <a href="/instructors/add" class="btn btn-outline-success" style="font-weight: bold; padding: 10px;">Tambah</a>
    </div>
    

    <table id="instructorlist">
        <tr class="bg-success">
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

        @foreach ($instructors as $instructor)    
            <tr>
                <td>{{$instructor->username}}</td>
                <td>{{$instructor->email}}</td>
                <td>{{$instructor->phone}}</td>
                <td>{{$instructor->address}}</td>
                <td style="display: flex; justify-content: space-evenly;">
                    <a href="/instructors/delete/{{$instructor->id}}" class="btn btn-outline-danger">Delete</a>
                    <a href="/instructors/update/{{$instructor->id}}" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
</section>
@endsection