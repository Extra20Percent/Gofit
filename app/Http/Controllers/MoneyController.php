<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;  
use App\Models\Money;
use Illuminate\Http\Request;
  
class moneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moneys = Money::latest()->paginate(5);
        $user = Auth::user();
        return view('moneys.index',compact('moneys', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneys.create');
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
            'name' => 'required',
            'money' => 'required',
            'detail',
        ]);
    
        Money::create($request->all());
     
        return redirect()->route('moneys.index')
                        ->with('success','money created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function show(money $money)
    {
        return view('moneys.show',compact('money'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function edit(Money $money)
    {
        return view('moneys.edit',compact('money'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Money $money)
    {
        $request->validate([
            'money' => 'required',
            'detail' => 'required',
        ]);
    
        $money->update($request->all());
    
        return redirect()->route('moneys.index')
                        ->with('success','money updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function destroy(Money $money)
    {
        $money->delete();
    
        return redirect()->route('moneys.index')
                        ->with('success','money deleted successfully');
    }
}