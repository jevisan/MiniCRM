@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add a new Company</h3>
        </div>
        {{-- form start --}}
        <form class="" action="{{ url('/companies') }}" method="post">
            @csrf
            <div class="card-body">
                <!-- NAME -->
                @include('forms.text_input',
                            [
                                'label' => 'Name',
                                'id' => 'company_name',
                                'name' => 'name',
                                'placeholder' => 'New Company\'s Name'
                            ])
                <!-- EMAIL -->
                @include('forms.text_input',
                            [
                                'label' => 'Email',
                                'id' => 'company_email',
                                'name' => 'email',
                                'type' => 'email',
                                'placeholder' => 'New Company\'s Email'
                            ])
                <!-- WEBSITE -->
                @include('forms.text_input',
                            [
                                'label' => 'Website',
                                'id' => 'company_website',
                                'name' => 'website',
                                'placeholder' => 'New Company\'s Website'
                            ])
                <!-- LOGO -->
                @include('forms.file_input',
                            [
                                'label' => 'Logo',
                                'id' => 'company_logo',
                                'name' => 'logo',
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
