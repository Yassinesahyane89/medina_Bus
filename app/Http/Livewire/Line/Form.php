<?php

namespace App\Http\Livewire\Line;

use App\Models\Line;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public Line $line;
    public $stations = [];
    public $buses = [];

    protected function rules()
    {
        return [
          'line.bus_id' => 'required|exists:buses,id',
          'line.code' => 'required|string|max:255',
          'line.start_station_id' => 'required|exists:stations,id',
          'line.end_station_id' => 'required|exists:stations,id',
          'line.departure_time' => 'required|date_format:H:i',
          'line.arrival_time' => 'required|date_format:H:i|after:line.departure_time',
          'line.distance_km' => 'required|numeric|min:0',
        ];
    }


    public function mount($line)
    {
        $this->stations = \App\Models\Station::all();
        $this->buses = \App\Models\Bus::all();
        $this->line = $line;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->line->save();

        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => 'success', 'message' => 'line updated successfully!']);

        return redirect('dashboard/line');
    }

    public function render()
    {
        return view('livewire.line.form');
    }
}
