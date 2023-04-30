@extends('layouts/layoutMaster')

@section('title', 'Line List')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')) }}">
    <link rel="stylesheet"
        href="{{ asset(mix('assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css')) }}">
    <link rel="stylesheet"
        href="{{ asset(mix('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/spinkit/spinkit.css')) }}" />

@endsection

@section('page-style')
    {{-- Page Css files --}}
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('assets/vendor/libs/block-ui/block-ui.js')) }}"></script>
@endsection

@section('page-script')
    <script type="text/javascript">
        window.addEventListener('livewire:load', function() {
            $(function() {
                var card = $(".card");
                console.log(card);

                card.block({
                    message: '<div class="spinner-border text-primary" role="status"></div>',
                    timeout: 1e3,
                    css: {
                        backgroundColor: "transparent",
                        border: "0"
                    },
                    overlayCSS: {
                        backgroundColor: "#fff",
                        opacity: .8
                    }
                })
            });
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @livewire('line.table')
        </div>
    </div>

@endsection
