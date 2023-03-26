@extends('layout')

@section('title')
    {{ $top }}: City Not Found
@endsection

@section('main')
    <div class="mb pb rounded-corners text-start">
        <p><h1>{{ $top }}: City Not Found</h1></p>
    </div>
    <div class="bg-info bg-gradient bg-opacity-10 mb pb rounded-corners">
        Please enter a valid city name in the search bar above, or try the auto location feature.
    </div>
@endsection
