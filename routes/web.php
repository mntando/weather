<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// Create a new Laravel application
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

// Ensure that all views are reloaded automatically
$app->make('view')->addNamespace('templates', resource_path('views'));

// Openweathermap API key (https://openweathermap.org/api)
$api_key = "0ef451aa617998b929aa1e094b1f157d";

// Configure database connection to use SQLite database
DB::connection()->getPdo()->exec("pragma foreign_keys=1;");
DB::connection()->getPdo()->exec("pragma journal_mode=wal;");
DB::connection()->getPdo()->exec("pragma synchronous=normal;");

// Define routes for the application
$app->get('/', function (Request $request) {
    $q = $request->input('q');
    if ($q) {
        // Error handling
        $code = 404;
        if ($q == 'error') {
            return view('templates.apology', ['top' => $code], $code);
        }
        return view('templates.index', ['location' => $q]);
    } else {
        return view('templates.welcome');
    }
});


// Get city list
$app->get('/search', function (Request $request) {
    $q = $request->input('q');
    if ($q) {
        $city = DB::select("SELECT * FROM cities WHERE name LIKE ? LIMIT 6", ['%'.$q.'%']);
    } else {
        $city = [];
    }
    return response()->json($city);
});


// Get current weather data
$app->get('/weather', function (Request $request) use ($api_key) {
    $city = $request->input('q');
    if ($city) {
        $city = str_replace(' ', '%20', $city);
        $url = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$api_key."&units=metric";
        $response = Http::get($url);
        $data = $response->json();
    } else {
        $data = [];
    }
    return response()->json($data);
});


// Weather forcast
$app->get('/forcast', function (Request $request) use ($api_key) {
    $lat = $request->input('lat');
    $lon = $request->input('lon');
    if ($lat && $lon) {
        $url = "http://api.openweathermap.org/data/2.5/forecast?lat=".$lat."&lon=".$lon."&appid=".$api_key."&units=metric&cnt=8";
        $response = Http::get($url);
        $data = $response->json();
    } else {
        $data = [];
    }
    return response()->json($data);
});


# Get city name
$app->get('/locate', function (Request $request) use ($api_key) {
    $lat = $request->input('lat');
    $lon = $request->input('lon');
    if ($lat && $lon) {
        $url = "http://api.openweathermap.org/geo/1.0/reverse?lat=".$lat."&lon=".$lon."&limit=1&appid=".$api_key;
        $response = Http::get($url);
        $data = $response->json();
    } else {
        $data = [];
    }
    return response()->json($data);
});


// Run the application
$app->run();
