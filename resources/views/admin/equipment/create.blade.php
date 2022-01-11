@extends('layouts.app')
@section('title', '| Create Equipment')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-header">
                        {{ __('Article') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.equipment.store') }}">
                            @csrf
                            <div class="row mb-4 me-0">
                                <span class="text-danger fw-bold">*Tous les champs sont obligatoires</span>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-md-12">
                                    <select class="form-control @error('content') is-invalid @enderror"
                                            name="equipment_category_id">
                                        <option disabled selected>Choisissez la catégorie...</option>
                                        @foreach ($categories_equipment as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('equipment_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-md-12">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           placeholder="Nom sous catégorie"
                                           value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-md-12">
                                    <input id="number" type="number"
                                           class="form-control @error('number') is-invalid @enderror" name="number"
                                           placeholder="Nombre d'equipement"
                                           value="{{ old('number') }}" autofocus>
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="col-md-12">
                                    <label><strong>En dehors de l'établissement ? : </strong></label><br>
                                    <input type="checkbox" 
                                    class="form-check-input @error('is_outside') is-invalid @enderror" 
                                    name="is_outside" placeholder="En dehors de l'établissement"
                                    value="1"
                                    >
                                    @error('is_outside')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end my-4 me-0">
                                <button class="btn-secondary-action col-4 col-lg-2" type="reset">Annuler</button>
                                <button class="btn-primary-action col-4 col-lg-2" type="submit">Poster</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
