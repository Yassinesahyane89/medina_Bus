<?php

namespace App\Http\Controllers;

use App\Models\Station;

class StationController extends Controller
{
    public function index()
    {
        return view('content.station.table');
    }

    public function create()
    {
        return view('content.station.form', [
            'station' => new Station(),
        ]);
    }

    public function edit($id)
    {
        $station = Station::find($id);

        return view('content.station.form', [
            'station' => $station,
        ]);
    }
  
    public function delete($id)
    {
        $station = Station::find($id);
        $station->delete();

        return redirect()->route('station.index');
    }
}
