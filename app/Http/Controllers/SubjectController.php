<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Courses;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
        if ($user->hasRole('Admin')) {
            $date['subjects']=subject::paginate(5);
        } else if ($user->hasRole('Teacher')) {
            $teacher=teachers::where('email', $user->email)->first();
            $date['subjects']=subject::where('id_teacher', $teacher->id)->get();
        } else if ($user->hasRole('Students')) {
            $student=students::where('email', $user->email)->first();
            $enrollments = enrollment::where('id_student', $student->id)->get();
            $student_enrollments = array();
            foreach($enrollments as $enrollment){
                array_push($student_enrollments, $enrollment->id_course);
            }

            $date['subjects']=subject::whereIn('id_course', $student_enrollments)->get();
        }

        foreach ($date['subjects'] as $subject) {
            $fetch_teacher=Teachers::findOrFail($subject->id_teacher);
            $subject['teacher']=$fetch_teacher->name . ' ' . $fetch_teacher->surname;
            $fetch_course=Courses::findOrFail($subject->id_course);
            $subject['course']=$fetch_course->name;
        }

        return view ('subjects.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses=courses::all();
        $teachers=teachers::all();

        return view('subjects.create', compact('courses','teachers'));

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
        $dateSubjects = request()->except('_token');
        Subject::insert($dateSubjects);
        return redirect('subjects')->with('message','Asignatura agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subjects=subject::findOrFail($id);

        $selectedCourse=Courses::findOrFail($subjects->id_course);
        $selectedTeacher=Teachers::findOrFail($subjects->id_teacher);

        $courses=courses::all();
        $teachers=teachers::all();
        return view('subjects.edit', compact('subjects','courses','teachers','selectedCourse','selectedTeacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dateSubjects = request()->except(['_token','_method']);
        subject::where('id','=',$id)->update($dateSubjects);


        return redirect('subjects')->with('message','Asignatura editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        subject::destroy($id);
        return redirect('subjects');
    }
}
