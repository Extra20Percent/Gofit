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
    <h1 style="text-align: center; color:white;">Jadwal</h1>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">   
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('schedules.create') }}"> Create New schedule</a>
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
            <th>Tanggal</th>
            <th>Nama Kegiatan</th>
            <th>Instruktor</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $schedule->schedule_for }}</td>
            <td>{{ $schedule->Nama_Kegiatan }}</td>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->instructor_id }}</td>
            <td>
                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('schedules.show',$schedule->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('schedules.edit',$schedule->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            
        </tr>
        
        @endforeach
    </table>
  
    {!! $schedules->links() !!}
      
@endsection