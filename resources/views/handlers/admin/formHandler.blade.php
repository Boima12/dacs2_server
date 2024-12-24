@extends('layouts.adminLayout') <!-- Use a layout if you want a reusable structure -->

@section('content')
    <div class="main">
        <div class="sidebar">
            <ul>
                <li><a href="#" class="active">Form</a></li>
                <li><a href="{{ route('sessionHandler') }}">Session</a></li>
            </ul>
        </div>

        <div class="mainDisplay">
            @if (isset($human))
                <p>Form submitted successfully!</p>
                <p>Name: {{ $human->name }}</p>
                <p>Hobby: {{ $human->hobby }}</p>
            @else
                <p>no data received yet</p>
            @endif
        </div>
    </div>
@endsection
