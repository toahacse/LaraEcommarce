@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="card card-body">
            <h3>Welcome to our Admin panel</h3>
            <br>
            <br>
            <p>
                <a href="{{ route('index') }}" class="btn btn-primary btn-lg" target="_blank">Visit our main site</a>
            </p>
        </div>
    </div>
@endsection
