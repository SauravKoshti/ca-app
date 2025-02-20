@extends('admin.layout.master')
@section('title', 'Create Group')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Group</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('groups.index')}}">Group</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Group Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Group</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('groups.store') }}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="groupName">Group Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="groupName" name="name" placeholder="Enter Group Name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="groupDescription">Group Description</label>
                                                <textarea class="form-control" id="groupDescription" name="description"
                                                    placeholder="Enter Last Name" rows="5">
                                                        </textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Create Group</button>
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