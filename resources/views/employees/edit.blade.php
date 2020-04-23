@extends('adminlte::page')

@section('title', $title)

@section('plugins.Select2', true)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add a new Employee</h3>
        </div>
        {{-- form start --}}
        <form action="{{ url('employees/'.$employee->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <!-- FIRTS NAME -->
                @include('forms.text_input', [
                                'label'         => 'First Name',
                                'id'            => 'first_name',
                                'name'          => 'first_name',
                                'value'         => $employee->first_name,
                                'placeholder'   => 'Employee\'s First Name'])
                <!-- LAST NAME -->
                @include('forms.text_input', [
                                'label'         => 'Last Name',
                                'id'            => 'last_name',
                                'name'          => 'last_name',
                                'value'         => $employee->last_name,
                                'placeholder'   => 'Employee\'s Last Name'])
                <!-- EMAIL -->
                @include('forms.text_input', [
                                'label'         => 'Email',
                                'id'            => 'employee_email',
                                'name'          => 'email',
                                'type'          => 'email',
                                'value'         => $employee->email,
                                'placeholder'   => 'Employee\'s Email'])
                <!-- PHONE -->
                @include('forms.text_input', [
                                'label'         => 'Phone',
                                'id'            => 'phone',
                                'name'          => 'phone',
                                'type'          => 'tel',
                                'value'         => $employee->phone,
                                'placeholder'   => 'Employee\'s Phone'])
                <!-- COMPANY -->
                @include('forms.select_input', [
                                'label'     => 'Company',
                                'id'        => 'select2',
                                'name'      => 'company',
                                'elements'  => App\Company::all(),
                                'selected'  => $employee->company
                ])


            </div>
            {{-- /.card body --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        {{-- form end --}}
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            // Initialize Select2 element
            $('#select2').select2()
        });
    </script>
@endsection
