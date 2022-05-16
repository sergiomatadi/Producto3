<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function __construct(){

        $this->middleware('can:students.index')->only('index');
        $this->middleware('can:students.index.create')->only('create');
        $this->middleware('can:students.index.edit')->only('edit', 'update');
        $this->middleware('can:students.index.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date['students']=students::paginate(15);
        return view ('students.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('students.create');
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
        $dateStudents = request()->except('_token');
        Students::insert($dateStudents);
        return redirect('students')->with('message','Estudiante agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $students=students::findOrFail($id);
        return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dateStudents = request()->except(['_token','_method']);
        students::where('id','=',$id)->update($dateStudents);


        
        return redirect('students')->with('message','Estudiante editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        students::destroy($id);
        return redirect('students');
    }
}
