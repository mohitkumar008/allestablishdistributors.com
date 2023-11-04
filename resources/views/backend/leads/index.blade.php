@extends('backend.layouts.app')
@section('leads_nav', 'active')

@section('css')
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/sweetalert/sweetalert.css') }}" />

    <style>
        td.details-control {
            background: url('assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('assets/images/details_close.png') no-repeat center center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Leads</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ul>
                </div>
                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ route('manufacturers.create') }}" class="btn btn-secondary">Create User</a>
                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom" id="leads-table" data-href="{{ route('leads.index') }}">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- page vendor js file -->
    <script src="{{ asset('backend/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/sweetalert/sweetalert.min.js') }}"></script>

    <!-- page js file -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>
    
    <script src="{{ asset('backend/js/DataTableCRUD.js') }}"></script>
    <script>
        const tableColumns = [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'mobile',
                name: 'mobile'
            },
            {
                data: 'location',
                name: 'location'
            },
            {
                data: 'status',
                name: 'status'
            }
        ];
        const crud = new DataTableCRUD('#leads-table', tableColumns);
    </script>
@endsection
