<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    //

    public function Usd()
    {
        session()->get('currency');
        session()->forget('currency');
        Session::put('currency', 'usd');
        return redirect()->back();
    }

    public function Vnd()
    {
        session()->get('currency');
        session()->forget('currency');
        Session::put('currency', 'vnd');
        return redirect()->back();
    }
}