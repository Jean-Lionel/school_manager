<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate();

       return Inertia::render('Teachers/Index',
                [
                    'teachers' => $teachers
                ]
            );
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
        // dd($request->all());

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'sexe' => 'required',
        ]);


        $teacher = $request->id == null ?
                     new Teacher : Teacher::find($request->id );
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->sexe = $request->sexe;

        $teacher->save();
       // Teacher::create();


        return redirect()->back()
        ->with('message', 'Réussi');
    }

   
    public function destroy(Request $request)
    {

        Teacher::find($request->input('id'))->delete();

        return redirect()->back();
       // dd($request);

        // return redirect()->back();

    }
}
