@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            </div>
        </section>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <a href="{{route('routines.index')}}" class="btn btn-info btn-sm">Back</a>
                                <h3 class="card-title">Routine Details</h3>
                            </div>
                            <div class="card-body">
                                <h5>Course: {{ $routine->course->course_name }}</h5>
                                <p>Day: {{ $routine->day }}</p>
                                <p>Start Time: {{ $routine->start_time }}</p>
                                <p>End Time: {{ $routine->end_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
