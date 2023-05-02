@extends('layouts/layoutMaster')

@section('title', 'Station Create')

@section('vendor-style')
@endsection

@section('page-style')
@endsection

@section('vendor-script')
@endsection

@section('page-script')
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Station Form</h5>
                <div class="card-body">
                    @livewire('station.form', ['station' => $station])
                </div>
            </div>
        </div>

    </div>

@endsection
