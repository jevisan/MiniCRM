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
        <form action="{{ url('/employees') }}" method="post">
            @csrf
            <div class="card-body">
                <!-- FIRTS NAME -->
                @include('forms.text_input', [
                                'label'         => 'First Name',
                                'id'            => 'first_name',
                                'name'          => 'first_name',
                                'placeholder'   => 'New Employee\'s First Name'])
                <!-- LAST NAME -->
                @include('forms.text_input', [
                                'label'         => 'Last Name',
                                'id'            => 'last_name',
                                'name'          => 'last_name',
                                'placeholder'   => 'New Employee\'s Last Name'])
                <!-- EMAIL -->
                @include('forms.text_input', [
                                'label'         => 'Email',
                                'id'            => 'employee_email',
                                'name'          => 'email',
                                'type'          => 'email',
                                'placeholder'   => 'New Employee\'s Email'])
                <!-- PHONE -->
                @include('forms.text_input', [
                                'label'         => 'Phone',
                                'id'            => 'phone',
                                'name'          => 'phone',
                                'type'          => 'tel',
                                'placeholder'   => 'New Employee\'s Phone'])
                <!-- COMPANY -->
                @include('forms.select_input', [
                                'label'     => 'Company',
                                'id'        => 'select2',
                                'name'      => 'company',
                                'elements'  => App\Company::all(),
                                'selected'  => App\Company::first()
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
