@extends('layouts.app')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('dist/libs/prismjs/themes/prism-okaidia.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/table-style.css') }}">

    <style>
        div.dt-container div.dt-paging ul.pagination {
            justify-content: {{ app()->getLocale() == 'ar' ? 'flex-end' : 'flex-start' }}
        }

        div.dataTables_wrapper div.dataTables_paginate {
            margin: 1rem auto;
            cursor: pointer;
            text-align: {!! app()->getLocale() == 'ar' ? 'right' : 'left' !!}
        }
    </style>
    @if (app()->getLocale() == 'ar')
        <style>
            .dropdown-menu {
                text-align: end
            }
        </style>
    @endif
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ Str::ucfirst(trans('tasks.list')) }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                {{ Breadcrumbs::render('tasks') }}
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('dist/images/breadcrumb/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display border table-bordered w-100" id="tasks-table">
                        <thead>
                            <tr>
                                <th @class(['text-center']) scope="col">#</th>
                                <th @class(['text-center']) scope="col">{{ trans('tasks.task name') }}</th>
                                <th @class(['text-center']) scope="col">{{ trans('tasks.end at') }}</th>
                                <th @class(['text-center']) scope="col">{{ trans('tasks.status') }}</th>
                                <th @class(['text-center']) scope="col">{{ trans('tasks.created at') }}</th>
                                <th @class(['text-center']) scope="col">{{ trans('tasks.updated at') }}</th>
                                <th @class(['text-center']) scope="col">{{ trans('global.action') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable/datatable-basic.init.js') }}"></script>
    <script>
        buttons = [{
                extend: 'colvis',
                className: 'btn btn-outline-dark fs-12 py-1',
                columns: ':not(.noVis)',
                popoverTitle: "{{ trans('global.column visibility') }}",
                text: "{{ trans('global.column visibility') }}"
            },
            {
                extend: 'csv',
                className: 'btn btn-outline-dark fs-12 py-1',
                text: "{{ trans('global.excel download') }}"
            }
        ];

        // get table laanguage
        let translation = JSON.parse(@js(json_encode(trans('pagination'))));
        let table = $('#tasks-table').DataTable({
            scrollX: true,
            stateSave: true,
            processing: true,
            serverSide: true,
            responsive: true,
            searching: true,
            pageLength: 10,
            ajax: {
                url: "{!! route('ajax.tasks.get-tasks') !!}",
                method: 'GET',
                error: function(xhr, error, code) {
                    if (xhr.status === 404) {
                        // Display an error message to the user
                        alert(xhr.responseJSON.error);
                    } else {
                        console.log(error);

                        // Handle other errors
                        alert(JSON.parse(@js(json_encode(trans('global.fetch data failed')))));
                    }
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'task_name',
                    className: 'dt-body-center'
                },
                {
                    data: 'end_date',
                    className: 'dt-body-center'
                },
                {
                    data: 'status',
                    className: 'dt-body-center'
                },
                {
                    data: 'created_at',
                    className: 'dt-body-center'
                },
                {
                    data: 'updated_at',
                    className: 'dt-body-center'
                },
                {
                    data: 'action',
                    className: 'dt-body-center',
                    orderable: false,
                    searchable: false,
                }
            ],
            success: function(response) {
                console.log(response)
            },
            lengthMenu: [
                [10, 25, 50, 100, 500, -1],
                [10, 25, 50, 100, 500, 'All'],
            ],
            dom: '<"#datatables-buttons.{{ app()->getLocale() == 'ar' ? 'ltr' : 'rtl' }} w-auto mb-3"B><".row g-3 mb-3"<".col-sm-12 col-lg-6"f><".col-sm-12 col-lg-6 text-start"l>>tip',
            buttons: [{
                extend: 'collection',
                text: JSON.parse(@js(json_encode(trans('global.control')))) + '&nbsp;<i class="bi bi-gear"></i>',
                autoClose: false,
                buttons: buttons
            }],
            language: translation.table,
            initComplete: function(settings, json) {
                table.columns.adjust().draw(); // Adjust column sizing after the table is rendered
            },
            drawCallback: function(settings) {
                // get data length
                let dataLength = settings.json.data.length;
                let tableWrapper = $('.dt-scroll-body');
                var newWidth = dataLength <= 10 ? tableWrapper.width() : tableWrapper.width() + 5;

                if (dataLength == 0) {
                    newScrollY = 'auto';
                } else if (dataLength <= 5) {
                    newScrollY = (dataLength * 70 + 30) + 'px';
                } else if (dataLength > 5 && dataLength <= 10) {
                    newScrollY = (dataLength * 60 + 30) + 'px';
                } else {
                    newScrollY = 600 + 'px';
                }
                // Update the height of the table body container
                tableWrapper.css({
                    "max-height": `${newScrollY}`,
                    "height": `${newScrollY}`,
                    "width": `${newWidth}`
                });
            }
        });
    </script>
@endpush
