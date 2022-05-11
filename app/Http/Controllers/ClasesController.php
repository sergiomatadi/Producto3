<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\Schedule;
use App\Models\Schedules;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date['clases']=clases::paginate(5);
        foreach($date['clases'] as $clase){
            $fetch_teacher=Teachers::findOrFail($clase->id_teacher);
            $clase['teacher']=$fetch_teacher->name.' ' .$fetch_teacher->surname;
            $fetch_course=Courses::findOrFail($clase->id_course);
            $clase['course']=$fetch_course->name;
            $fetch_schedule=Schedule::findOrFail($clase->id_schedule);
            $clase['schedule']=$fetch_schedule->day;


        }
        return view ('clases.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases=clases::all();
        $teachers=teachers::all();
        $courses=courses::all();
        $schedules=schedule::all();
        return view ('clases.create',compact('courses','teachers','schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clases = request()->except('_token');
        Clases::insert($clases);
        return redirect('clases')->with('message','Clase agregada correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function show(Clases $clases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases=clases::findOrFail($id);

        $selectedCourse=Courses::findOrFail($clases->id_course);
        $selectedTeacher=Teachers::findOrFail($clases->id_teacher);
        $selectedSchudule=Schedule::findOrFail($clases->id_schedule);

        $courses=courses::all();
        $teachers=teachers::all();
        $schedule=schedule::all();
        return view('clases.edit', compact('clases','schedule','courses','teachers','selectedCourse','selectedTeacher','selectedSchudule'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clases = request()->except(['_token','_method']);
        clases::where('id','=',$id)->update($clases);
        return redirect('clases')->with('message','Curso editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        clases::destroy($id);
        return redirect('clases');
    }
}
