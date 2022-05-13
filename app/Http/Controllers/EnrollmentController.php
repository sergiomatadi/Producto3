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
        $date['enrollments']=enrollment::paginate(5);
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
        $courses=courses::all();
        $students=students::all();
        return view ('enrollments.create',compact('courses','students'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}