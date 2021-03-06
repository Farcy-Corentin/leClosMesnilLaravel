<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use DateTimeImmutable;
class SeasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View|Factory
    {
        $seasons = Season::OrderByDesc('created_at')->paginate(30);
        return view('admin.season.index', compact('seasons'));
    }

    public function create()
    {
        $seasons = Season::all();
        return view('admin.season.create', compact('seasons'));
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $season = $this->storeSeason($request->all());
        $season->save();
        return redirect()
            ->route('admin.season.create')
            ->with(['success' => 'Création de la Saison']);
    }

    public function show()
    {
    }

    public function edit()
    {
    }


    public function update()
    {
    }

    public function destroy()
    {
    }

    private function storeSeason(array $seasonData, Season|null $season = null): Season
    {
        $format = 'd/m/Y';
        $startedAt = DateTimeImmutable::createFromFormat($format, $seasonData['started_at']);
        $finishedAt = DateTimeImmutable::createFromFormat($format,$seasonData['finished_at']);
        $startedAt->format('Y-m-d');
        $finishedAt->format('Y-m-d');
        $season ??= new Season();
        $season->started_at = $startedAt;
        $season->finished_at = $finishedAt;
        $season->price = (int) $seasonData['price'] * 100;
        $season->save();
        return $season;
    }
}
