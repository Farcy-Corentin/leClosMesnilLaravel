<?php

namespace App\Http\Controllers;



class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        return view('home');
    }
}
