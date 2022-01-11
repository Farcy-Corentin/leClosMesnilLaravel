<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Transformer\FractalTransformer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HotelController extends Controller
{
    use FractalTransformer;

    public function getAbout(): View|Factory
    {
        $hotels = Hotel::all();
        return view('home', compact('hotels'));
    }
}