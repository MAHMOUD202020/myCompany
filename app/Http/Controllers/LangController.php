<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LangController extends Controller
{
    function index($lang){

        $lang = $lang === "ar" ? 'ar' : 'en';

        $cookie = Cookie::forever('lang-website' , $lang);

        return back()->withCookie($cookie);
    }
}
