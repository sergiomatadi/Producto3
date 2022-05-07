<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function __construct(){

        $this->middleware('can:teachers.index')->only('index');
        $this->middleware('can:teachers.index.create')->only('create');
        $this->middleware('can:teachers.index.edit')->only('edit', 'update');
        $this->middleware('can:teachers.index.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date['teachers']=teachers::paginate(5);
        return view ('teachers.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('teachers.create');
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
        $dateTeachers = request()->except('_token');
        Teachers::insert($dateTeachers);
        return redirect('teachers')->with('message','Profesor agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teachers=teachers::findOrFail($id);
        return view('teachers.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dateTeachers = request()->except(['_token','_method']);
        teachers::where('id','=',$id)->update($dateTeachers);


        return redirect('teachers')->with('message','Profesor editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        teachers::destroy($id);
        return redirect('teachers');
    }
}
