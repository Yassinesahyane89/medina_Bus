<div class="card mb-4">
    <h5 class="card-header">Line List</h5>
    <hr class="mt-0">
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label> Show
                            <select wire:model="perPage" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>
                            Search:
                            <input wire:model.debounce.500ms="search" type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="table-responsive" wire:init="loadData">
                <table class="datatables-ajax table dataTable no-footer" id="DataTables_Table_0"
                    aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr>
                            <th class="sorting {{ $sortBy == "code" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('code')" aria-controls="DataTables_Table_0">
                                Code
                            </th>
                            <th class="sorting {{ $sortBy == "bus_id" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('bus_id')" aria-controls="DataTables_Table_0">
                                bus_id
                            </th>
                            <th class="sorting {{ $sortBy == "start_station_id" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('start_station_id')" aria-controls="DataTables_Table_0">
                                Start Station
                            </th>
                            <th class="sorting {{ $sortBy == "end_station_id" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('end_station_id')" aria-controls="DataTables_Table_0">
                                End Station
                            </th>
                            <th class="sorting {{ $sortBy == "departure_time" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('departure_time')" aria-controls="DataTables_Table_0">
                                Departure Time
                            </th>
                            <th class="sorting {{ $sortBy == "arrival_time" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('arrival_time')" aria-controls="DataTables_Table_0">
                                Arrival Time
                            </th>
                            <th class="sorting {{ $sortBy == "distance_km" ? 'sorting_'.$sortDirection : '' }}" wire:click="sortBy('distance_km')" aria-controls="DataTables_Table_0">
                                Distance km
                            </th>
                            <th aria-controls="DataTables_Table_0">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lines['data'] as $line)
                            <tr>
                                <td><strong>{{ $line['code'] }}</strong></td>
                                <td>{{ $line['bus']['brand'] }}</td>
                                <td>{{ $line['start_station']['code'] }}</td>
                                <td>{{ $line['end_station']['code'] }}</td>
                                <td>{{ $line['departure_time'] }}</td>
                                <td>{{ $line['arrival_time'] }}</td>
                                <td>{{ $line['distance_km'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('line.edit', $line['id']) }}"><i
                                                    class="ti ti-pencil me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="{{ route('line.delete', $line['id']) }}"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (! empty($lines['links']))
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                            Showing {{ $lines['from'] }} to {{ $lines['to'] }} of {{ $lines['total'] }} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous @disabled($currentPage == 1)" id="DataTables_Table_0_previous">
                                    <button wire:click="changePage({{ $lines['current_page'] - 1 }})" @disabled($currentPage == 1) aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="previous" class="page-link">
                                        Previous
                                    </button>
                                </li>

                                @for ($i = 1; $i <= $lines['last_page']; $i++)
                                    <li class="paginate_button page-item {{ $lines['current_page'] == $i ? 'active' : ''  }}">
                                        <button wire:click="changePage({{ $i }})" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="{{ $i }}" class="page-link">
                                            {{ $i }}
                                        </button>
                                    </li>
                                @endfor

                                <li class="paginate_button page-item next @disabled($lines['last_page'] == $currentPage)" id="DataTables_Table_0_next">
                                    <button wire:click="changePage({{ $lines['current_page'] + 1 }})" @disabled($lines['last_page'] == $currentPage) aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="next" class="page-link">
                                        Next
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>
