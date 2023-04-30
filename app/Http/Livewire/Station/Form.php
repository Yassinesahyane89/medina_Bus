<?php

namespace App\Http\Livewire\Station;

use App\Models\Station;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public Station $station;

    protected function rules()
    {
        return [
          'station.code' => 'required|string|max:255',
          'station.name' => 'required|string|max:255',
          'station.address' => 'required|string|max:255',
        ];
    }


    public function mount($station)
    {
        $this->station = $station;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->station->save();

        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => 'success', 'message' => 'station updated successfully!']);

        return redirect('dashboard/station');
    }

    public function render()
    {
        return view('livewire.station.form');
    }
}
