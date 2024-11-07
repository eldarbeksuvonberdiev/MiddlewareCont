<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Stadium::orderBy('id','desc')->paginate(10);
        return view('stadium.index',['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'address' =>'required',
            'capacity' =>'required',
        ]);
        Stadium::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Stadium $stadium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stadium $stadium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stadium $stadium)
    {
        $request->validate([
            'name' =>'required',
            'address' =>'required',
            'capacity' =>'required',
        ]);
        $stadium->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stadium $stadium)
    {
        $stadium->delete();
        return redirect()->back();
    }
}
