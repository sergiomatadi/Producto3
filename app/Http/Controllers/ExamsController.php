<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Models\Students;
use App\Models\Clases;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date['exams']=Exams::paginate(5);
        foreach ($date['exams'] as $exam){
            $fetch_student=Students::findOrFail($exam->id_student);
            $exam['student']=$fetch_student->name . ' ' . $fetch_student->username;
            $fetch_clase=Clases::findOrFail($exam->id_class);
            $exam['clase']=$fetch_clase->name;
        }

        return view ('exams.index', $date);
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
        return view ('exams.create', compact('clases','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateExams = request()->except('_token');
        exams::insert($dateExams);
        return redirect('exams')->with('message','Trabajo agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function show(Exams $exams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $exams = Exams::findOrFail($id);
        // $selectedClase=clases::findOrFail($exams->id_clases);
         $selectedStudent=students::findOrFail($exams->id_student);
 
         $clases=clases::all();
         $students=students::all();
 
         return view ('exams.edit', compact('exams', 'selectedStudent', 'clases', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dateExams = request()->except(['_token','_method']);
        Exams::where('id','=',$id)->update($dateExams);


        return redirect('exams')->with('message','Examen editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        exams::destroy($id);
        return redirect ('exams');
    }
}
