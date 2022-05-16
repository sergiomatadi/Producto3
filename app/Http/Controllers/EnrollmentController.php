<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\Courses;
use App\Models\Teachers;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
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
            $date['enrollments']=enrollment::paginate(5);
        } else if ($user->hasRole('Students')) {
            $student=students::where('email', $user->email)->first();
            $date['enrollments']=enrollment::where('id_student', $student->id)->get();
        }

        foreach ($date['enrollments'] as $enrollment) {

            $fetch_course=Courses::findOrFail($enrollment->id_course);
            $enrollment['course']=$fetch_course->name;
            $fetch_student=Students::findOrFail($enrollment->id_student);
            $enrollment['student']=$fetch_student->name;
        }



        return view ('enrollments.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        $user = auth()->user();
        $student=students::where('email', $user->email)->first();
        $courses=courses::all();
        return view ('enrollments.create',compact('courses','student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dateEnrollment = request()->except('_token');
        Enrollment::insert($dateEnrollment);
        return view('dashboard');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment=enrollment::all();

        $enrollment=enrollment::findOrFail($id);
        //$selectedCourse=courses::findOrFail($enrollment->id_course);

        $student=students::all();
        $courses=courses::all();

    return view ('enrollments.edit', compact('enrollment',  'student', 'courses'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dateEnrollment = request()->except(['_token','_method']);
        enrollment::where('id','=',$id)->update($dateEnrollment);


        return redirect('enrollments')->with('message','Inscripción editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        enrollment::destroy($id);
        return redirect ('enrollments');
    }

}
