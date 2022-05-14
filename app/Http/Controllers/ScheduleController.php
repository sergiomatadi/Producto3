<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Students;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        if ($user->hasRole('Admin') || $user->hasRole('Teacher')) {
            $date['schedules']=schedule::paginate(5);
        } else if ($user->hasRole('Students')) {
            $student=students::where('email', $user->email)->first();
            $enrollments = enrollment::where('id_student', $student->id)->get();
            $student_enrollments = array();
            foreach($enrollments as $enrollment){
                array_push($student_enrollments, $enrollment->id_course);
            }

            $subjects=subject::whereIn('id_course', $student_enrollments)->get();
            $student_subjects = array();
            foreach($subjects as $subject){
                array_push($student_subjects, $subject->id);
            }

            $date['schedules']=schedule::whereIn('id_subject', $student_subjects)->get();
        }


        foreach ($date['schedules'] as $schedule) {
            $fetch_subject=Subject::findOrFail($schedule->id_subject);
            $schedule['subject']=$fetch_subject->name;
        }
        return view ('schedules.index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects=subject::all();
        return view('schedules.create', compact('subjects'));
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
        $dateSchedules = request()->except('_token');
        Schedule::insert($dateSchedules);
        return redirect('schedules')->with('message','Horario agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $schedules=schedule::findOrFail($id);
        $selectedSubject=Subject::findOrFail($schedules->id_subject);
        $subjects=subject::all();

        return view('schedules.edit', compact('schedules','subjects','selectedSubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dateSchedules = request()->except(['_token','_method']);
        schedule::where('id','=',$id)->update($dateSchedules);


        return redirect('schedules')->with('message','Horario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        schedule::destroy($id);
        return redirect('schedules');
    }
}
