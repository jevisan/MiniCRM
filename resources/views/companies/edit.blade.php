@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Company</h3>
        </div>
        {{-- form start --}}
        <form class="" action="{{ url('/companies/'.$company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                @include('forms.edit_company')
            </div>
            {{-- /.card body --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('companies')}}" type="submit" class="btn btn-default">Return to list</a>
            </div>
        </form>
        {{-- form end --}}
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('plugins/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
