<?php

namespace App\Http\Controllers;

use App\Models\Line;

class LineController extends Controller
{
    public function index()
    {
        return view('content.line.table');
    }

    public function create()
    {
        return view('content.line.form', [
            'line' => new Line(),
        ]);
    }

    public function edit($id)
    {
        $line = Line::find($id);

        return view('content.line.form', [
            'line' => $line,
        ]);
    }

    public function delete($id)
    {
        $line = Line::find($id);
        $line->delete();

        return redirect()->route('line.index');
    }
}
