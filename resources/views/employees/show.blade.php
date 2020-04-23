@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <span class="fa fa-user" style="font-size:60px"></span>
                    </div>

                    <h3 class="profile-username text-center">{{$employee->first_name.' '.$employee->last_name}}</h3>
                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$employee->email ?? '-'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{$employee->phone ?? '-'}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Company</b> <a class="float-right">{{$employee->company ? $employee->company->name:'-'}}</a>
                        </li>
                    </ul>

                    <a href="{{url('employees/'.$employee->id.'/edit')}}" class="btn btn-primary btn-block"><b><i class="fa fa-pencil"></i> Edit</b></a>
                </div>
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Related Employees</h3>
                </div>
                {{-- /.card-header --}}
                <div class="card-body">
                    {{-- @foreach ($company->employees as $employee)
                        <div class="post">
                            <div class="user-block">
                                <div class="user-block">
                                    <span class="fa fa-user"></span>
                                    <span class="username">
                                        <a href="#">{{ $employee->first_name.' '.$employee->last_name }}</a>

                                    </span>
                                    <span class="description">Created</span>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
                {{-- /.card-body --}}
            </div>
        </div>
    </div>
@endsection
