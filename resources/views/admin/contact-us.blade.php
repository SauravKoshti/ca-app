@extends('admin.layout.master')
@section('title','Contact')
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
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-body">
                        @if (!$contacts->isEmpty())
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                            <button class="btn btn-primary me-md-2" type="button"
                                onclick="downloadSelectedUserData()">Download Data</button>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="selectAll"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="selectAll"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="contact_id" data-id="{{ $contact->id }}">
                                        </td>
                                        <td>{{ $contact->name }} </td>
                                        <td>{{ $contact->email }} </td>
                                        <td>{{ $contact->mobile }} </td>
                                        <td>{{ $contact->message }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
function downloadSelectedUserData() {
    let allIds = [];

    let selectAllCheckbox = document.getElementById("selectAll");

    document.querySelectorAll('[name="contact_id"]:checked').forEach(function(checkbox) {
        allIds.push(checkbox.getAttribute('data-id'));
    });

    if (allIds.length === 0) {
        alert("Please select at least one user.");
        return;
    }
    $.ajax({
        url: "/contact/download/csv",
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            contact_user_ids: allIds
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function(response, status, xhr) {
            let filename = "users.xlsx";

            // Extract filename from response headers
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
</script>