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
        <form class="" action="{{ url('/companies/'.$company->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <!-- NAME -->
                @include('forms.text_input',
                            [
                                'label' => 'Name',
                                'id' => 'company_name',
                                'name' => 'name',
                                'placeholder' => 'New Company\'s Name',
                                'value' => $company->name
                            ])
                <!-- EMAIL -->
                @include('forms.text_input',
                            [
                                'label' => 'Email',
                                'id' => 'company_email',
                                'name' => 'email',
                                'type' => 'email',
                                'placeholder' => 'New Company\'s Email',
                                'value' => $company->email
                            ])
                <!-- WEBSITE -->
                @include('forms.text_input',
                            [
                                'label' => 'Website',
                                'id' => 'company_website',
                                'name' => 'website',
                                'placeholder' => 'New Company\'s Website',
                                'value' => $company->website
                            ])
                <!-- LOGO -->
                @include('forms.file_input',
                            [
                                'label' => 'Logo',
                                'id' => 'company_logo',
                                'name' => 'logo',
                                'value' => $company->logo
                            ])

            </div>
            {{-- /.card body --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        {{-- form end --}}
    </div>
@endsection
