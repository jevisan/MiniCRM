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
                @include('forms.new_employee')
            </div>
            {{-- /.card body --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('employees')}}" type="submit" class="btn btn-default">Return to list</a>
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
