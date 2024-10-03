<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments=Equipment::orderBy('process_No')->paginate(15);;
        return view('equipment.index',compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'process'=>'required|max:20',
            'process_No'=>'required|max:20|unique:Equipment,process_No',
            'equipment_name'=>'required|max:20|unique:Equipment,equipment_name',
          
        ]);

        $validated['user_id']=auth()->id();

        $equipment = Equipment::create($validated);

        return redirect()->route('equipment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        return view('Equipment.show',compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        return view('equipment.edit',compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
           
            'process'=>'required|max:20',
            'process_No'=>'required|max:20',
            'equipment_name'=>'required|max:20',
          
        ]);

        $validated['user_id']=auth()->id();

        $equipment->update($validated);

        return redirect()->route('equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipment.index');
    }
}
