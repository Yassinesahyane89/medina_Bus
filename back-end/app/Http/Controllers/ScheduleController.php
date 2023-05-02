<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('content.schedule.table');
    }

    public function create()
    {
        return view('content.schedule.form', [
            'schedule' => new Schedule(),
        ]);
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);

        return view('content.schedule.form', [
            'schedule' => $schedule,
        ]);
    }
 
    public function delete($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
