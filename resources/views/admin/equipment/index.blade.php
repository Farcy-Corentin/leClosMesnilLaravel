@extends('layouts.app')
@section('title', '| Show Post')

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Name</th>
                    <th>Catégorie Equipement</th>
                    <th>Quantité(s)</th>
                    <th>Activité en dehors</th>
                    <th class="col-3">Créer le</th>
                    <th class="col-3">Editer le</th>
                    <th class="col-3">Action</th>
                </tr>
                @foreach($equipments as $equipment)
                <tr>
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->equipmentCategory->name }}</td>
                    <td>{{ $equipment->number }}</td>
                    @if ($equipment->is_outside == '1')
                        <td><span class="badge rounded-pill bg-primary">En dehors de l'établissement</span></td>
                    @else
                        <td>non</td>
                    @endif
                    <td>{{ $equipment->created_at->format("d-m-Y H:m:s") }}</td>
                    @if($equipment->updated_at)
                        <td>{{ $equipment->updated_at->format("d-m-Y H:m:s") }}</td>
                    @else
                        <td>Aucune mise à jour</td>
                    @endif
                    <td>
                        
                        <form method="POST" action="{{ route('admin.equipment.destroy', ['equipment' => $equipment->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary-action col-4 col-lg-12">Supprimer</button>
                        </form>
                        <a type="button" href="{{ route('admin.equipment.edit', $equipment->id) }}"
                            class="btn-primary-action editLink text-decoration-none text-center col-12 col-lg-10">
                            Editer
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
