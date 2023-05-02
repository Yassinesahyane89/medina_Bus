<?php

namespace App\Http\Livewire\Bus;

use App\Models\Bus;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public Bus $bus;

    protected function rules()
    {
        return [
          'bus.brand' => 'required|string|max:255',
          'bus.purchase_date' => 'required|date',
          'bus.passenger_capacity' => 'required|integer|min:1',
        ];
    }


    public function mount($bus)
    {
        $this->bus = $bus;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->bus->save();

        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => 'success', 'message' => 'bus updated successfully!']);

        return redirect('dashboard/bus');
    }

    public function render()
    {
        return view('livewire.bus.form');
    }
}
