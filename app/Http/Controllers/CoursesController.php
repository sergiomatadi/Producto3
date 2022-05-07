<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __construct(){

        $this->middleware('can:courses.index')->only('index');
        $this->middleware('can:courses.index.create')->only('create');
        $this->middleware('can:courses.index.edit')->only('edit', 'update');
        $this->middleware('can:courses.index.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date['courses']=courses::paginate(5);
        return view ('courses.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('courses.create');
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
        $dateCourses = request()->except('_token');
        $active = request()->boolean('active');
        request()->merge(['active' => $active]);
        Courses::insert($dateCourses);
        return redirect('courses')->with('message','Profesor agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courses=courses::findOrFail($id);
        return view('courses.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $active = request()->boolean('active');
        request()->merge(['active' => $active]);
        $dateCourses = request()->except(['_token','_method']);

        courses::where('id','=',$id)->update($dateCourses);


        return redirect('courses')->with('message','Profesor editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        courses::destroy($id);
        return redirect('courses');
    }
}
