<?php

namespace App\Http\Controllers;


use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $from = $request->input('from');
        $until = $request->input('until');
        $part_search = $request->input('part_search');
        $menu_search = $request->input('menu_search');
        $q = Result::query();

        $query = $q->orderBy('date','asc');

        if (isset($from) && isset($until)) {
            $query = $q->whereBetween("date", [$from, $until]);
        }

        $results = $query->paginate(10);

        //$results=Result::orderBy('date')->paginate(10);


        return view('result.index',compact('results','from','until'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('result.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date'=>'required',
            'shift'=>'required',
            'production_rate'=>'required|max:20',
            'production_time'=>'required|max:20',
            'working_rate'=>'required|max:20',
            'JPH'=>'required|max:20',
            'body'=>'required|max:800',
            'image'=>'required|file|image|max:2000|mimes:jpeg,jpg,png|dimensions:min_width=300,min_height=300,max_width=1200,max_height=1200',
        ]);

        $validated['image'] = $request->file('image')->store('results','public');

        $validated['user_id']=auth()->id();

        $result = Result::create($validated);

        return redirect()->route('result.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
      return view('result.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        return view('result.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'date'=>'required',
            'shift'=>'required',
            'production_rate'=>'required|max:20',
            'production_time'=>'required|max:20',
            'working_rate'=>'required|max:20',
            'JPH'=>'required|max:20',
            'body'=>'required|max:800',
            'image'=>'required|file|image|max:2000|mimes:jpeg,jpg,png|dimensions:min_width=300,min_height=300,max_width=1200,max_height=1200',
        ]);

        $validated['image'] = $request->file('image')->store('results','public');
        $validated['user_id']=auth()->id();

        $result->update($validated);

        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('result.index');
    }
}
