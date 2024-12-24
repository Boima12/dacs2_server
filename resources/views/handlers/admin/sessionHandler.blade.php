@extends('layouts.adminLayout') <!-- Use a layout if you want a reusable structure -->

@section('content')
    <div class="main">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('formHandler') }}">Form</a></li>
                <li><a href="#" class="active">Session</a></li>
            </ul>
        </div>

        <div class="mainDisplay">
            <p>session handler</p>
        </div>
    </div>
@endsection
