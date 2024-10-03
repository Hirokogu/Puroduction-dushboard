<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\User;
use App\Models\Breakdown;

class BreakdownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->breakdowns = new Breakdown();
        $breakdowns = $this->breakdowns->getdate();

 
        return view('breakdown.index',compact('breakdowns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $equipments = Equipment::get();

        return view('breakdown.create',compact('equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'date'=>'required',
            'process_No'=>'required',
            'count'=>'required',
          
        ]);

        $validated['user_id']=auth()->id();

        $breakdown = Breakdown::create($validated);

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
