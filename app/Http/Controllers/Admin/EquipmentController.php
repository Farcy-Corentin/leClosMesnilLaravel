<?php
namespace App\Http\Controllers\Admin;

use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\EquipmentStoreRequest;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View|Factory
    {
        $equipments = Equipment::all();
        return view('admin.equipment.index', compact('equipments'));
    }

    public function create(): View|Factory
    {
        $categories_equipment = EquipmentCategory::all();
        
        return view('admin.equipment.create', compact('categories_equipment'));
    }

    public function store(EquipmentStoreRequest $request): Redirector|RedirectResponse
    {
        $requestData = $request->all();
        $requestData['is_outside'] = $request->has('is_outside');
        $equipment = $this->storeEquipment($requestData);
        
        return redirect()
            ->route('admin.equipment.show', $equipment->id)
            ->with(['success' => 'Modification de l\'article']);
    }

    public function edit(string $id): View|Factory
    {
        $post = Equipment::find($id);
        $categories = EquipmentCategory::All();
        return view('admin.equipment.edit', compact('post', 'categories'));
    }

    public function update(EquipmentStoreRequest $request, Equipment $equipment): Redirector|RedirectResponse 
    {
        $requestData = $request->all();
        $requestData['is_outside'] = $request->has('is_outside');
        $equipment = $this->storeEquipment($requestData);
    
        return redirect()
            ->route('admin.equipment.show', $equipment->id)
            ->with(['success' => 'L\'équipement à bien été sauvegardé']);
    }

    public function destroy(Equipment $equipment): RedirectResponse
    {
        $equipment->delete();

        return redirect()
            ->route('admin.equipment.index')
            ->with(['success' => 'Supprimé avec succès']);
    }

    /**
     * @param array $equipmentData
     * @param Equipment|null $equipment
     * @param Request $request
     * @return Equipment
     */
    public function storeEquipment(array $equipmentData, Equipment|null $equipment = null): Equipment
    {
        $equipment ??= new Equipment();
        $equipment->name = $equipmentData['name'];
        $equipment->number = $equipmentData['number'] ?? null;
        $equipment->equipment_category_id = $equipmentData['equipment_category_id'];
        $equipment->is_outside = $equipmentData['is_outside'];
        $equipment->save();
        
        return $equipment;
    }
}