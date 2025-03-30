@extends('admin.layout.master')
@section('title','Groups')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Groups</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Groups</h4>
                        <a
                            href="{{route('groups.create')}}"
                            class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Add Groups
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- <div class="card"> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="group-basic-datatables"
                                class="display table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <!-- <th>Date</th> -->
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('section_script')
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#group-basic-datatables').DataTable({
        "dom": '<"top"f>rt<"bottom"pli><"clear">',
        processing: true,
        searching: true,
        serverSide: true,
        ajax: "{{ route('groups.index') }}",
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
        drawCallback: function(settings) {
            // feather.replace(); // Initialize Feather icons
            // Check if no data is returned
            let api = this.api();
            let rows = api.rows({
                page: 'current'
            }).count();

            // Hide pagination if no data
            if (rows === 0) {
                $('.dataTables_paginate').hide();
            } else {
                $('.dataTables_paginate').show();
            }
        }
    });
});
</script>

@endsection