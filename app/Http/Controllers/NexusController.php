<?php

namespace App\Http\Controllers;

use App\Models\Nexus;
use Illuminate\Http\Request;

class NexusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('titlesearch')){
            $items = Nexus::search($request->titlesearch)
                ->paginate(6);
        }else{
            $items = Nexus::paginate(6);
        }

        return view('nexs',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required', 'description'=>'required']);

        Nexus::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Nexus $nexus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nexus $nexus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nexus $nexus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nexus $nexus)
    {
        //
    }
}
