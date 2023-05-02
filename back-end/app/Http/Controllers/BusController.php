<?php

namespace App\Http\Controllers;

use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        return view('content.bus.table');
    }

    public function create()
    {
        return view('content.bus.form', [
            'bus' => new Bus(),
        ]);
    }

    public function edit($id)
    {
        $bus = Bus::find($id);

        return view('content.bus.form', [
            'bus' => $bus,
        ]);
    }
    
    public function delete($id)
    {
        $bus = Bus::find($id);
        $bus->delete();

        return redirect()->route('bus.index');
    }
}
