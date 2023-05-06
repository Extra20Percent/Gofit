<?php
  
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use Illuminate\Http\Request;
  
class ScheduleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = schedule::latest()->paginate(5);
        $user = Auth::user();
    
        return view('schedules.index',compact('schedules', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'schedule_for'=> 'required',
            'Nama_Kegiatan'=> 'required',
            'name'=> 'required',
            'instructor_id',
        ]);
    
        schedule::create($request->all());
     
        return redirect()->route('schedules.index')
                        ->with('success','schedule created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedule $schedule)
    {
        $request->validate([
            'schedule_for'=> 'required',
            'Nama_Kegiatan'=> 'required',
            'name'=> 'required',
            'instructor_id',
        ]);
    
        $schedule->update($request->all());
    
        return redirect()->route('schedules.index')
                        ->with('success','schedule updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedule $schedule)
    {
        $schedule->delete();
    
        return redirect()->route('schedules.index')
                        ->with('success','schedule deleted successfully');
    }
    
}