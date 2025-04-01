@extends('admin.layout.master')
@section('title', 'Users')
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
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex bd-highlight mb-2">
                        <div class="me-auto p-2 bd-highlight">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <button id="downloadExcel" class="btn btn-success">Download Excel</button>
                            <button id="downloadPdf" class="btn btn-danger">Download PDF</button>
                            @if (auth()->user()->user_type == 'admin')
                            <a href="{{ route('users.create') }}" class="btn btn-info d-flex align-items-center">
                                <i class="fa fa-plus me-1"></i> Add Users
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users-basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        @if (auth()->user()->user_type == 'admin')
                                        <th><input type="checkbox" name="select_all" id="selectAll"></th>
                                        @endif
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('section_script')
<script>
    function downloadSelectedUserData() {
        let allIds = [];

        let selectAllCheckbox = document.getElementById("selectAll");

        document.querySelectorAll('[name="user_id"]:checked').forEach(function(checkbox) {

            allIds.push(checkbox.getAttribute('data-id'));
        });

        if (allIds.length === 0 && !selectAllCheckbox.checked) {
            alert("Please select at least one user.");
            return;
        }

        $.ajax({
            url: "/users/download/csv",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                user_ids: allIds,
                is_select_all: selectAllCheckbox.checked
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response, status, xhr) {
                let filename = "users.xlsx";
                let disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    let match = disposition.match(/filename="(.+)"/);
                    if (match && match[1]) filename = match[1];
                }

                let blob = new Blob([response], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to download user data. Please try again.');
            }
        });
    }

    let columns = [];

    let userType = "{{ auth()->user()->user_type }}";
    $(document).ready(function() {
        // Select All Checkbox functionality
        $("#selectAll").on("change", function() {
            let isChecked = $(this).prop("checked");
            $('[name="user_id[]"]').prop("checked", isChecked);
        });

        $(document).on("change", '[name="user_id[]"]', function() {
            let allChecked = $('[name="user_id[]"]').length === $('[name="user_id[]"]:checked').length;
            $("#selectAll").prop("checked", allChecked);
        });

        // Function to get selected data
        function getSelectedData() {
            let selectedRows = [];
            $('[name="user_id[]"]:checked').each(function() {
                let row = $(this).closest("tr"); // Get the row of the selected checkbox
                selectedRows.push([
                    row.find("td:eq(1)").text(), // Name
                    row.find("td:eq(2)").text(), // Email
                    row.find("td:eq(3)").text(), // Username
                    row.find("td:eq(4)").text() // DOB
                ]);
            });
            return selectedRows;
        }

        if (userType === "admin") {
            columns.push({
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            });
        }

        columns.push({
            data: 'name',
            name: 'name'
        }, {
            data: 'email',
            name: 'email'
        }, {
            data: 'username',
            name: 'username'
        }, {
            data: 'dob',
            name: 'dob'
        }, {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        });
        let table = $('#users-basic-datatables').DataTable({
            processing: true,
            searching: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: columns,
            drawCallback: function(settings) {
                let api = this.api();
                let rows = api.rows({
                    page: 'current'
                }).count();

                if (rows === 0) {
                    $('.dataTables_paginate').hide();
                } else {
                    $('.dataTables_paginate').show();
                }
            }
        });
         // Function to get all table data, not just selected
         function getAllTableData() {
            let allData = table.rows().data().toArray(); // Get all data from DataTable
            let formattedData = allData.map(row => [row.name, row.email, row.username, row.dob]); // Format it
            return formattedData;
        }

        // Download as Excel (All Data)
        $("#downloadExcel").on("click", function() {
            let allData = getAllTableData();
            if (allData.length === 0) {
                alert("No data available!");
                return;
            }

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet([
                ["Name", "Email", "Username", "DOB"], ...allData
            ]);
            XLSX.utils.book_append_sheet(wb, ws, "Users");
            XLSX.writeFile(wb, "all_users.xlsx");
        });
        // Download as PDF
        $("#downloadPdf").on("click", function() {
            let selectedData = getSelectedData();
            if (selectedData.length === 0) {
                alert("No data selected!");
                return;
            }

            const {
                jsPDF
            } = window.jspdf;
            let doc = new jsPDF();
            doc.text("Selected Users Data", 14, 10);
            doc.autoTable({
                head: [
                    ["Name", "Email", "Username", "DOB"]
                ],
                body: selectedData
            });
            doc.save("selected_users.pdf");
        });


    });
    
</script>
@endsection