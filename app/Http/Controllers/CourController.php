<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cours = Cour::with('teacher','classe')->when($request->val , function($query, $val){

            $query->where('name','LIKE', '%'.$val.'%');

        })->paginate();
        $classes = Classe::all();
        $teachers = Teacher::all();

        return Inertia::render('Cours/index', 
            [
                'cours' => $cours,
                'classes' => $classes,
                'teachers' => $teachers,
            ]);
        //
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
        //

         $request->validate([
            'name' => 'required',
            'classe_id' => 'required',
            'ponderation' => 'required',
            'classe_id' => 'required',
            'teacher_id' => 'required',

        ]);

        $cours = Cour::create($request->all());

        return redirect()->back()
        ->with('message', 'Le cour a été ajouté');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cour $cour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cour $cour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cour $cour)
    {
        //
    }
}
