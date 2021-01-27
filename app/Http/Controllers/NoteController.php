<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = Note::latest()->get();
        
        $cours = Cour::all();
        $classes = Classe::with('students')->get();

        return Inertia('Notes/index',[
            'cours' => $cours,
            'classes' => $classes,
            'notes' => $notes,

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
                    'course_id' => "required",
                    'classe_id' => "required",
                    'type_travail' => "required",
                    'travail_numero' => "required",
                    'ponderation' => "required",
                    'trimestre' => "required",
                    'anne_scolaire_id' => "required"
        ]);

        $classe = Classe::find($request->classe_id);

        if($classe->students){
             $student_tab = [];
               $now = Carbon::now();
            foreach ($classe->students as $student) {
                $student_tab[] = [

                'trimestre' => $request->trimestre,
                'travail_numero' => $request->travail_numero,
                'point_obtenu' => $request->point_obtenu,
                'ponderation' => $request->ponderation,
                'student_id' =>  $student->id,
                'course_id' => $request->course_id,
                'classe_id' => $request->classe_id,
                'anne_scolaire_id' => $request->anne_scolaire_id,
                'created_at' => $now,
                'updated_at' => $now,

                ];
            }

            if($student_tab)
            {
                Note::insert($student_tab);
            }
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
       $note->delete();

        return redirect()->back();
    }
}
