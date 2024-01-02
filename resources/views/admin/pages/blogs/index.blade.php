@extends('admin.layouts.app')

@push('breadcrumb')
{!! Breadcrumbs::render('users_list') !!}
@endpush

@push('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />
@endpush

@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="{{ $icon }} text-primary"></i>
                </span>
                <h3 class="card-label">{{ $custom_title }}</h3>
            </div>

            <div class="card-toolbar">
                @if (in_array('delete', $permissions))
                <a href="{{ route('admin.blogs.destroy', 0) }}" name="del_select" id="del_select"
                    class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2 delete_all_link">
                    <i class="far fa-trash-alt"></i> Delete Selected
                </a>
                @endif
                @if (in_array('add', $permissions))
                <a href="{{ route('admin.blogs.create') }}"
                    class="btn btn-sm btn-primary font-weight-bolder text-uppercase">
                    <i class="fas fa-plus"></i>
                    Add {{ $custom_title }}
                </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            {{-- Datatable Start --}}
            <table class="table table-bordered table-hover table-checkable" id="blogs_table"
                style="margin-top: 13px !important"></table>
            {{-- Datatable End --}}
        </div>
    </div>
</div>
@endsection

@push('extra-js')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    var table = $('#blogs_table');
        oTable = table.dataTable({
            processing: true,
            serverSide: true,
            searching: true,
            pageLength: 10,
            responsive: false,
            pagingType: 'full_numbers',
            ajax: {
                "url": "{{ route('admin.blogs.index') }}", // ajax source
            },
            language: {
                lengthMenu: "Showing _MENU_ records",
                sInfo : "Showing _START_ to _END_ of _TOTAL_ results",
                sEmptyTable: "No Blogs found !",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                }
            },
            // columnDefs: [{
            //     className: "text-center text-muted",
            //     targets: [1, 2, 3, 4, 5, 6]
            // }],
            "columns": [
                { data: "updated_at", title: "", sortable: false,visible: false,searchble: false},
                @if (in_array('delete', $permissions))
                    { "data": "checkbox", "title": "<center><input type='checkbox' class='all_select'></center>", orderable: false, searchble: false },
                @endif
                { data: "title", title: "Blog Title", sortable: true },
                { data: "description", title: "Description", sortable: false },
                { data: "category_name", title: "Category", sortable: false, searchble: false },
                @if (in_array('edit', $permissions))
                    { "data": "is_active", "title": "Status", searchble: false, sortable: false },
                @endif
                @if (in_array('delete', $permissions) || in_array('edit', $permissions))
                    { "data": "action", "title": "Action", searchble: false, sortable: false }
                @endif
            ],
            order: [
                [0, 'desc']
            ],
            lengthMenu: [
                [10, 20, 50, 100],
                [10, 20, 50, 100]
            ],
            drawCallback: function(oSettings) {
                $('.status-switch').bootstrapSwitch();
                $('.status-switch').bootstrapSwitch('onColor', 'success');
                $('.status-switch').bootstrapSwitch('offColor', 'danger');
                removeOverlay();
            },
            "dom": "lfrtip"
            /**
             * Default "dom" is : lfrtip
             *
             * l - length changing input control
             * f - filtering input
             * t - The table!
             * i - Table information summary
             * p - pagination control
             * r - processing display element
             */
        });
</script>
@endpush
