@extends('admin.layout.master')
@section('title','User-CRUD')
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
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Users</h4>
                            <a
                                href="{{route('users.create')}}"
                                class="btn btn-primary btn-round ms-auto"
                            >
                                <i class="fa fa-plus"></i>
                                Add Users
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        id="basic-datatables"
                                        class="display table table-striped table-hover"
                                    >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>UserName</th>
                                            <!--<th>AdharCard</th> -->
                                            <th>DOB</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>UserName</th>
                                            <!-- <th>AdharCard</th> -->
                                            <th>DOB</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->first_name }} {{ $user->last_name }} </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <!-- <td>{{ $user->pancard }}</td> -->
                                                <td>{{ $user->dob }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Show User">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        
                                                        <a href="{{ route('users.document', $user->id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="User document">
                                                        <i class="fa-solid fa-file-arrow-up"></i>
                                                        </a>

                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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
    </div>
@endsection
{{--@include('admin.layout.change-theme-color')--}}
