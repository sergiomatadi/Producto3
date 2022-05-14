<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Models\Students;
use App\Models\Clases;
use App\Models\Enrollment;
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
        $user = auth()->user();
        if ($user->hasRole('Admin') || $user->hasRole('Teacher')) {
            $date['exams']=Exams::paginate(5);
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

            $date['exams']=Exams::whereIn('id_class', $student_clases)
            ->where('id_student', $student->id)
            ->get();
        }


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
