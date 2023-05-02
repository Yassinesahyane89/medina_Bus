<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public Schedule $schedule;
    public $lines = [];
    public $stations = [];

    protected function rules()
    {
        return [
            'schedule.line_id' => 'required|exists:lines,id',
            'schedule.station_id' => 'required|exists:stations,id',
            'schedule.direction' => 'required|string|max:255',
            'schedule.arrival_time' => 'required|date_format:H:i',
            'schedule.departure_time' => 'required|date_format:H:i',
        ];
    }


    public function mount($schedule)
    {
        $this->lines = \App\Models\Line::all();
        $this->stations = \App\Models\Station::all();
        $this->schedule = $schedule;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->schedule->save();

        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'title' => 'success', 'message' => 'schedule updated successfully!']);

        return redirect('dashboard/schedule');
    }

    public function render()
    {
        return view('livewire.schedule.form');
    }
}
