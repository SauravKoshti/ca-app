@extends('admin.layout.master')
@section('title', 'Edit Group')
@section('content')
    <div class="container">
        <div class="page-inner">
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
                        <a href="#">Edit Group</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Group</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Form for Editing Group -->
                                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') 
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">First Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="Enter Group Name"
                                                           value="{{ old('name', $group->name) }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="description">First Description</label>
                                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description">
                                                        {{ old('description', $group->description) }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update Group</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
