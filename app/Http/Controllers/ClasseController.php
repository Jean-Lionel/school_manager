<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Level;
use Illuminate\Http\Request;
use Inertia\Inertia;



class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $classes = Classe::latest()->get();
        
        return Inertia::render('classes/index', [
           'levels' => $levels,
           'classes' => $classes
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'level_id' => 'required',
            'name' => 'required'

        ]);
        Classe::create($request->all());

        return redirect()->back()
        ->with('message', 'La classe a été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        // dd($request->all());

        $request->validate([
            'level_id' => 'required',
            'name' => 'required'

        ]);

        if ($request->has('id')) {

            Classe::find($request->input('id'))->update($request->all());
            return redirect()->back()

            ->with('message', ' Updated Successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
