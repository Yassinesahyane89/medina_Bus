<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class Table extends Component
{
    public $schedules = [
        'data' => [],
        'links' => [],
        'meta' => [],
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public $search; // search value
    public $perPage = 10; // defult per page 10
    public $status = null; // null value means all
    public $currentPage = 1; // defult current page
    public $sortBy = 'id'; // defult sort by id
    public $sortDirection = 'asc'; // defult sort direction


    public function updated()
    {
        $this->loadData();
    }

    public function sortBy($field, $direction = null)
    {
        $this->sortDirection = $direction ?? ($this->sortDirection == 'asc' ? 'desc' : 'asc');
        $this->sortBy = $field;
        $this->loadData();
    }

    public function changePage($page)
    {
        $this->currentPage = $page;
        $this->loadData();
    }

    public function updatedPerPage()
    {
        $this->currentPage = 1;
        $this->loadData();
    }

    public function loadData()
    {
        $this->schedules = Schedule::when(!empty($this->search), function ($query) {
            $query->where('id', 'like', '%' . $this->search . '%');
                // ->orWhere('email', 'like', '%' . $this->search . '%');
        })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->with('line', 'station')
            ->paginate($this->perPage, ['*'], 'page', $this->currentPage)
            ->toArray();
    }

    public function render()
    {
        return view('livewire.schedule.table');
    }
}
