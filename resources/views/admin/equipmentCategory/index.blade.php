@extends('layouts.app')
@section('title', '| Show Post')

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Titre</th>
                    <th class="col-3">Créer le</th>
                    <th class="col-3">Editer le</th>
                    <th class="col-3">Action</th>
                </tr>
                @foreach($equipments_category as $equipmentCategory)
                <tr>
                    <td>{{ $equipmentCategory->name }}</td>
                    <td>{{ $equipmentCategory->created_at->format("d-m-Y H:m:s") }}</td>
                    @if($equipmentCategory->updated_at)
                        <td>{{ $equipmentCategory->updated_at->format("d-m-Y H:m:s") }}</td>
                    @else
                        <td>Aucune mise à jour</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.equipmentCategory.show', $equipmentCategory->id) }}" class="btn btn-outline-primary">View</a>

                        <form method="POST" action="{{ route('admin.equipmentCategory.destroy', ['equipmentCategory' => $equipmentCategory->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary-action col-4 col-lg-12">Supprimer</button>
                        </form>

                        {{-- <a type="button" href="{{ route('admin.equipmentCategory.edit', $equipmentCategory->id) }}"
                            class="btn-primary-action editLink text-decoration-none text-center col-12 col-lg-10">
                            Editer
                        </a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
