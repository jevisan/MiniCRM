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
            <h3 class="card-title panelcustom-header">Company listing</h3>
            <a href="{{ url('companies/create') }}" class="btn btn-sm btn-primary panelcustom-button"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="card-body">
            <table id="companiesTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td><i class="fa fa-building"></i> {{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('companies/'.$company->id) }}" class="btn btn-info btn-flat">Examine</a>
                                    <a href="{{url('companies/'.$company->id.'/edit')}}" class="btn btn-warning btn-flat">Edit</a>
                                    <form action="{{url('companies/'.$company->id)}}" method="post" onsubmit="return ConfirmDelete()">
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
            $("#companiesTable").DataTable({
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
