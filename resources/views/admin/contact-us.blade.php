@extends('admin.layout.master')
@section('title','Contact')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ul class="breadcrumbs">
            <li class="nav-home">
                    <a href="{{ route('admin.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <span>Contact</span>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        
                                        <td>{{ $contact->name }} </td>
                                        <td>{{ $contact->email }} </td>
                                        <td>{{ $contact->mobile }} </td>
                                        <td>{{ $contact->message }} </td>
                                        <td>{{ $contact->created_at }} </td>
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
      document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("selectAll").addEventListener("change", function() {
        let isChecked = this.checked;
        
        // Select or deselect all individual checkboxes based on the "Select All" checkbox
        document.querySelectorAll('[name="contact_id"]').forEach(function(checkbox) {
            checkbox.checked = isChecked;
        });
    });
});
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