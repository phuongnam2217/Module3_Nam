<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    function setLocale($locale)
    {
        session()->put('locale',$locale);
        return back();
    }
}
