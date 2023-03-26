@extends('layout')

@section('title')
    Welcome
@endsection

@section('main')

<div class="mb pb rounded-corners text-start">
    <p><h4>Welcome to Weather50!</h4></p>
    <p>Please enter a city name in the search bar above to get the weather for that location.</p>
    <p>Or you can press Auto to get your location using your device GPS.</p>
</div>
<div class="bg-info bg-gradient bg-opacity-10 mb pb rounded-corners">
    This is a weather app that uses the OpenWeatherMap API to get weather data. It is written in Python using the Flask framework
    and is hosted on Render, I use the free tier so it may take a few seconds to load.
</div>

@endsection
