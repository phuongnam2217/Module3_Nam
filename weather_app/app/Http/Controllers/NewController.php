<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewController extends Controller
{
    public function index()
    {
        $dataJson = Http::get('https://vnexpress.net/rss/tin-moi-nhat.rss');
        $data = $dataJson->body();
        $xml=simplexml_load_string($data);
        $news = $xml->channel;
        return view('news.index',compact('news'));
    }
}
