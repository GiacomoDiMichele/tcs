<!--
=========================================================
* Material Dashboard PRO - v3.0.1
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-dashboard-pro
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        {{ config('app.name') }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css')}}?v=3.0.1" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/general-css-custom.css')}}?v=3.0.1" rel="stylesheet" />


    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/DataTables/DataTables-1.11.2/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/Selectize/selectize-standalone.min.css') }}" rel="stylesheet" />


    <link id="pagestyle" href="{{ asset('css/datatable-custom.css')}}?v=3.0.1" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('css/material-custom.css')}}?v=3.0.1" rel="stylesheet" />
    @stack('css')
    <style>
        .table-show tr{
            cursor: pointer !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="g-sidenav-show  bg-gray-200">
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('layouts.navbar')
    <div class="container-fluid py-4">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible text-white mb-4" role="alert">
                @foreach ($errors->all() as $error)
                    - <span class="text-sm">{{$error}}</span> <br>
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/choices.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/quill.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dropzone.min.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('vendors/DataTables/DataTables-1.11.2/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendors/Selectize/selectize-standalone.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js')}}?v=3.0.1"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{ asset('js/jsgrid.js') }}"></script>
<script src="{{ asset('js/utils.js') }}"></script>

<script>

    $.extend( true, $.fn.dataTable.defaults, {
        "serverSide": true,
        "procesing":true,
        "responsive": true,
        "order": [1,'asc'],
        "buttons": [
            {
                "extend": "excelHtml5",
                "title": "excel"
            },
            {
                "extend": "print",
                "title": "print"
            }
        ],
        "autoWidth":true,
        "lengthMenu":[[10,30,50,-1],["10 Righe","30 Righe","50 Righe","Tutto"]],
        "createdRow": function( row, data, dataIndex ) {
            $(row).data('id', data.id);
        },
        "language": {
            "url": "{{asset('datatable.'.app()->getLocale().'.json')}}",
        },
    });

</script>

@stack('scripts')

</body>

</html>
