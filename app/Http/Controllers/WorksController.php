<?php

namespace App\Http\Controllers;

use App\Models\Works;
use App\Models\Students;
use App\Models\Clases;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('Admin') || $user->hasRole('Teacher')) {
            $date['works']=Works::paginate(5);
        } else if ($user->hasRole('Students')) {
            $student=students::where('email', $user->email)->first();
            $enrollments = enrollment::where('id_student', $student->id)->get();
            $student_enrollments = array();
            foreach($enrollments as $enrollment){
                array_push($student_enrollments, $enrollment->id_course);
            }

            $clases=clases::whereIn('id_course', $student_enrollments)->get();
            $student_clases=array();
            foreach($clases as $clase){
                array_push($student_clases, $clase->id);
            }

            $date['works']=Works::whereIn('id_class', $student_clases)
            ->where('id_student', $student->id)
            ->get();
        }


        foreach ($date['works'] as $work){
            $fetch_student=Students::findOrFail($work->id_student);
            $work['student']=$fetch_student->name . ' ' . $fetch_student->username;
            $fetch_clase=Clases::findOrFail($work->id_class);
            $work['clase']=$fetch_clase->name;
        }

        return view ('works.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases=clases::all();
        $students=students::all();
        return view ('works.create', compact('clases','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateWorks = request()->except('_token');
        works::insert($dateWorks);
        return redirect('works')->with('message','Trabajo agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function show(Works $works)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works = works::findOrFail($id);
       // $selectedClase=clases::findOrFail($works->id_clases);
        $selectedStudent=students::findOrFail($works->id_student);

        $clases=clases::all();
        $students=students::all();

        return view ('works.edit', compact('works', 'selectedStudent', 'clases', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dateWorks = request()->except(['_token','_method']);
        works::where('id','=',$id)->update($dateWorks);


        return redirect('works')->with('message','Trabajo editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        works::destroy($id);
        return redirect ('works');
    }
}
