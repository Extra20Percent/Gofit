@extends('layout.FullPage')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>jadwal</h2>
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
    
    
   
    <table class="table table-bordered">
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