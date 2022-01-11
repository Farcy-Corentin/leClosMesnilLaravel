@extends('layouts.app')
@section('title', '| Show Post')

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th class="col-3">Créer le</th>
                    <th class="col-3">Editer le</th>
                    <th class="col-3">Action</th>
                </tr>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->description }}</td>
                    <td>{{ $hotel->created_at->format("d-m-Y H:m:s") }}</td>
                    @if($hotel->updated_at)
                        <td>{{ $hotel->updated_at->format("d-m-Y H:m:s") }}</td>
                    @else
                        <td>Aucune mise à jour</td>
                    @endif
                    <td>
                        <form method="POST" action="{{ route('admin.hotel.destroy', ['hotel' => $hotel->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary-action col-4 col-lg-12">Supprimer</button>
                        </form>
                    </td>
                    <td>
                        <a type="button" href="{{ route('admin.hotel.edit', $hotel->id) }}"
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
