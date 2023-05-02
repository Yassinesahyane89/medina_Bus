<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public Admin $admin;

    protected function rules()
    {
        return [
            'admin.name' => 'required|min:6',
        ];
    }


    public function mount($admin)
    {
        $this->admin = $admin;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->admin->save();

        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => 'success', 'message' => 'admin updated successfully!']);

        return redirect('admin');
    }

    public function render()
    {
        return view('livewire.admin.form');
    }
}
