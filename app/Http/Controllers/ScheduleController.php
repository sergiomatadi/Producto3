<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
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
        $date['schedules']=schedule::paginate(5);
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
