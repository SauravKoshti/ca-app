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
                                            <th>Phone Number</th>
                                            <th>Message</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Message</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            <tr>
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
    </div>
@endsection
{{-- @include('admin.layout.script') --}}
