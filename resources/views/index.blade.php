@extends('layouts.adminLayout') <!-- Use a layout if you want a reusable structure -->

@section('content')
    <div class="main">
        <div class="sidebar">
            <ul>
                <li><a href="{{ url('/form-handler') }}">Form</a></li>
                <li><a href="{{ url('/session-handler') }}">Session</a></li>
            </ul>
        </div>

        <div class="mainDisplay">
            <p>Click any section on the sidebar to view</p>
        </div>
    </div>
@endsection
