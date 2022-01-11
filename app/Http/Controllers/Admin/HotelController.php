<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelStoreRequest;
use App\Models\Hotel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View|Factory
    {
        $hotels = Hotel::all();
        return view('admin.hotel.index', compact('hotels'));
    }

    public function create(): View|Factory
    {
        return view('admin.hotel.create');
    }

    public function store(HotelStoreRequest $request): Redirector|RedirectResponse
    {
        $hotel = $this->storeHotel($request->all());
        $hotel->save();

        return redirect()
            ->route('admin.hotel.create')
            ->with(['success' => 'Sauvegardé']);
    }

    public function edit(string $id): View|Factory
    {
        $hotel = Hotel::find($id);

        return view("admin.hotel.edit", compact('hotel'));
    }

    public function update(HotelStoreRequest $request, Hotel $hotel): Redirector|RedirectResponse
    {
        $this->storeHotel($request->all(), $hotel);
        $hotel->save();

        return redirect()
            ->route('admin.hotel.index', $hotel->id)
            ->with(['success' => 'Modification avec succées']);
    }

    public function destroy(Hotel $hotel): RedirectResponse
    {
        $hotel->delete();

        return redirect()
            ->route('admin.hotel.index')
            ->with(['success' => 'Supprimé avec succès']);
    }

    public function storeHotel(array $hotelData, Hotel|null $hotel = null): Hotel
    {
        $hotel ??= new Hotel();
        $hotel->name = $hotelData['name'];
        $hotel->description = $hotelData['description'];
        $hotel->save();

        return $hotel;
    }
}