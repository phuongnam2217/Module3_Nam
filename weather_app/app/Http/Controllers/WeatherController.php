<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $dataJson = Http::get('api.openweathermap.org/data/2.5/weather',
            ['q' => 'Hanoi', 'appid' => 'facc58bc8ba0e9f247159133afad18ee']);
        $result = json_decode($dataJson->body());
        $celsius = round($result->main->temp - 273);
        $nameCity = $result->name;
        $weather = $result->weather[0]->description;
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDayDateTimeString();

        return view('weather.index',compact('celsius','nameCity','weather','time'));
    }
    public function changeCity($city)
    {
        $dataJson = Http::get('api.openweathermap.org/data/2.5/weather',
            ['q' => $city, 'appid' => 'facc58bc8ba0e9f247159133afad18ee']);
        $result = json_decode($dataJson->body());
        $celsius = $result->main->temp;
        $nameCity = $result->name;
        $weather = $result->weather[0]->description;
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDayDateTimeString();
        return response()->json(['city'=>$nameCity,'celsius'=>$celsius,'weather'=>$weather,'time'=>$time]);
    }
}
