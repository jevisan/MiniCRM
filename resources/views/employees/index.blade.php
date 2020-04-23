@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/panelcustom.css') }}">
@endsection

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title panelcustom-header">Employees listing</h3>
            <a href="{{ url('employees/create') }}" class="btn btn-sm btn-primary panelcustom-button"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <table id="employeesTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-user"></i> Name</th>
                        <th><i class="fa fa-envelope"></i> Email</th>
                        <th><i class="fa fa-mobile"></i> Phone</th>
                        <th><i class="fa fa-building"></i> Company</th>
                        <th><i class="fa fa-cogs"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name.' '.$employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('employees/'.$employee->id) }}" class="btn btn-info btn-flat">Examine</a>
                                    <a href="{{url('employees/'.$employee->id.'/edit')}}" class="btn btn-warning btn-flat">Edit</a>
                                    <form action="{{url('employees/'.$employee->id)}}" method="post" onsubmit="return ConfirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-flat">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {
            $("#employeesTable").DataTable({
                "responsive": true,
                "autoWidth": true,
            });
        });

        function ConfirmDelete() {
            console.log("hola");
            var resp = confirm("Are you sure you want to delete?");
            if (resp) return true; else return false;
        }
    </script>
@endsection
