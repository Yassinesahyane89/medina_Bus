<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('content.admin.table');
    }

    public function create()
    {
        return view('content.admin.form', [
            'admin' => new Admin(),
        ]);
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('content.admin.form', [
            'admin' => $admin,
        ]);
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.index');
    }
}
