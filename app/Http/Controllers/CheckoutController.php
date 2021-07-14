<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('checkout',   compact('cart'));
    }
}
