<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class EquipmentController extends Controller
{
    public function getEquipment(): View|Factory
    {
        $equipments = EquipmentCategory::all();
        $underCategories = Equipment::all();
        return view('equipment', compact('equipments', 'underCategories'));
    }
}
