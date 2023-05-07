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

    #schedulelist tr:nth-child(even){background-color:  #ffdf80;}

    #schedulelist tr:nth-child(odd){background-color: #ffdf80;}

    #schedulelist th, #schedulelist td{
        border: 1px solid white;
        padding: 8px;
    }

    #schedulelist {
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #schedulelist th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(44, 44, 44);
        color: white;
    }
</style>
 
@section('content')
    <div class="row">
    <h1 style="text-align: center; color:white;">Money</h1>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">   
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('moneys.create') }}"> Deposit Member</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table id="schedulelist">
        <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Money</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($moneys as $money)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $money->name }}</td>
            <td>{{ $money->money }}</td>
            <td>{{ $money->detail }}</td>
            <td>
                <form action="{{ route('moneys.destroy',$money->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('moneys.show',$money->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('moneys.edit',$money->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $moneys->links() !!}
      
@endsection