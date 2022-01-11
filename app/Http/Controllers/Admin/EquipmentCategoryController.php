<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentCategoryStoreRequest;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class EquipmentCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View|Factory
    {
        $equipments_category = EquipmentCategory::all();
        return view('admin.equipmentCategory.index', compact('equipments_category'));
    }

    public function create(): View|Factory
    {
        return view('admin.equipmentCategory.create');
    }

    public function store(EquipmentCategoryStoreRequest $request): Redirector|RedirectResponse
    {
        $equipment_category = $this->store_equipment_category($request->all());
        $equipment_category->save();
        return redirect()
            ->route('admin.equipmentCategory.create')
            ->with(['success' => 'Sauvegardé']);
    }

    public function show(string $id): View|Factory
    {
        $equipment = EquipmentCategory::where("id","=", $id)->first();
        $equipmentCategory = Equipment::all();
        return view("admin.equipmentCategory.index", compact('equipment','equipmentCategory'));
    }

    public function edit(string $id): View|Factory
    {
        $equipment_category = EquipmentCategory::find($id);
        return view("admin.equipmentCategory.edit", compact('equipment_category'));
    }

    public function update(
        EquipmentCategoryStoreRequest $request, 
        EquipmentCategory $equipment_category
    ): Redirector|RedirectResponse
    {
        $this->storeHotel($request->all(), $equipment_category);

        $equipment_category->save();

        return redirect()
            ->route('admin.equipmentCategory.index', $equipment_category->id)
            ->with(['success' => 'Modification avec succées']);
    }

    public function destroy(EquipmentCategory $equipmentCategory): RedirectResponse
    {
        $equipmentCategory->delete();
        return redirect()
            ->route('admin.equipmentCategory.index')
            ->with(['success' => 'Supprimé avec succès']);
    }

    public function store_equipment_category(
        array $equimentCategoryData, 
        EquipmentCategory|null $equiment_category = null
    ): EquipmentCategory
    {
        $equiment_category ??= new EquipmentCategory();
        $equiment_category->name = $equimentCategoryData['name'];
        $equiment_category->description = $equimentCategoryData['description'];
        $equiment_category->icon = $equimentCategoryData['icon'];
        $equiment_category->save();

        return $equiment_category;
    }
}