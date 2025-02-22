@extends('admin.layout.master')
@section('title','Users')
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
                        <div class="d-grid d-md-flex justify-content-md-end">
                            @if (!$users->isEmpty())
                            <button class="btn btn-primary me-md-2" type="button"
                                onclick="downloadSelectedUserData()">Download User Data</button>
                            @endif
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-round">
                                <i class="fa fa-plus"></i> Add Users
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="selectAll"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="selectAll"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>DOB</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">No documet records found.</td>
                                    </tr>
                                    @else
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="user_id" data-id="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }} </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                    title="Show User">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                                    title="Edit User">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger"
                                                        data-bs-toggle="tooltip" title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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

    document.querySelectorAll('[name="user_id"]:checked').forEach(function(checkbox) {
        allIds.push(checkbox.getAttribute('data-id'));
    });

    if (allIds.length === 0) {
        alert("Please select at least one user.");
        return;
    }

    $.ajax({
        url: "/users/download/csv",
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            user_ids: allIds
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