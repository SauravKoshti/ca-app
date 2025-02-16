@extends('admin.layout.master')
@section('title', 'Create User')
@section('content')
<div class="container">
    <!-- <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div> -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Group Details</div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Group</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Users</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list"
                                type="button" role="tab" aria-controls="list" aria-selected="false">Users
                                List</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- <div class="card"> -->
                        <!-- <div class="card-header">
                            <div class="card-title">Group</div>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <p class="form-control-static">{{ $groupData->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <p class="form-control-static">{{ $groupData->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="user-profile-card">
                            <!-- <div class="card-header">
                                <div class="card-title">Upload Documents</div>
                            </div> -->
                            <form method="post" action="{{ route('groups.store.users') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        
                                        <div class="container">
                                            <div class='col-sm-6'>
                                            <label>Add User in group:</label>
                                                <select id="select2-multiple-input-sm"  name="usersGroup[]" 
                                                    class="form-control input-sm select2-multiple" multiple>
                                                    @foreach ($userData as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <select name="usersGroup[]" class=""
                                            aria-label="multiple select example" multiple>
                                            @foreach ($userData as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endforeach
                                        </select> -->
                                        <input type="hidden" name="group_id" value="{{ $groupData->id }}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="user-card">
                            <!-- <div class="card-header">
                                <div class="card-title">User List</div>
                            </div> -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if ($userListData->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">No User records found.</td>
                                    </tr>
                                    @else
                                        @foreach ( $userListData as $user )
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of User List Tab -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection