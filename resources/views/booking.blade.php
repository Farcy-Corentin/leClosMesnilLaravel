@extends('layouts.app')
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/datePicker.js') }}" defer></script>
@endsection
@section('content')
    <div class="container mb-5">
        <div class="row imageGrid d-none d-sm-flex gridImgRounded mb-4">
            <div class="col-6 pe-0">
                <div class="big-image">
                    <img
                        src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="imgRoundedTopBottomRight" alt="">
                </div>
            </div>
            <div class="col-3 pe-0">
                <div class="row g-0">
                    <div class="small-image mb-2">
                        <img
                            src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            alt="">
                    </div>
                    <div class="small-image">
                        <img
                            src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row g-0">
                    <div class="small-image mb-2">
                        <img
                            src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            class="imgRoundedTopRight" alt="">
                    </div>
                    <div class="small-image">
                        <img
                            src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            class="imgRoundedBottomRight" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide d-block d-sm-none my-2" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://images.pexels.com/photos/4507715/pexels-photo-4507715.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section class="mb-4">
            <div class="row g-0">
                <div class="col-12 col-sm-12 col-md-7 col-xl-8">
                    <h2 class="fw-bold">Le Clos Mesnil</h2>
                    <p>
                        Fatigué du stresse de la ville, vous avez besoin d'un endroit calme et clos où vous relaxer,
                        le Clos Mesnil est l'endroit idéal pour vous détendre, le calme de la campagne vous apaisera.
                    </p>
                    <p>
                        Vous pourrez profiter de la plage du Tréport pour faire une petite baignade ou vous baladez dans
                        la forêt d'Eu pour respirer l'air frais et écouter le gazouillis des oiseaux.
                    </p>
                    <p>
                        L'hiver, vous pourrez trouver le réconfort et la chaleur de la cheminée
                        mise à votre disposition pour un moment cocooning en famille.
                    </p>
                    <h2>Equipement</h2>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-xl-4 bookingForm">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <span class="price">80€ </span>
                            <span>
                                /nuit
                            </span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 text-lg-end text-xl-end pt-1">
                            <i class="fas fa-star"></i>
                            <span class="rating">5</span>
                            <span class="nbComment">(18 commentaires)</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="range" class="my-1">
                            <div class="row">
                                <div class="col-6">
                                    <input id="start" type="text"
                                           class="form-control @error('started_at') is-invalid @enderror"
                                           name="started_at"
                                           placeholder="Arrivée?"
                                           value="{{ old('started_at') }}" autofocus autocomplete="off">
                                    @error('started_at')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input id="end" type="text"
                                           class="form-control @error('finished_at') is-invalid @enderror"
                                           name="finished_at"
                                           placeholder="Départ?"
                                           value="{{ old('finished_at') }}" autofocus autocomplete="off">
                                    @error('finished_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <input id="nb_adult" type="number"
                                       class="form-control @error('nb_adult') is-invalid @enderror" name="nb_adult"
                                       placeholder="Adulte(s)?"
                                       value="{{ old('nb_adult') }}" autofocus>
                                @error('nb_adult')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input id="nb_children" type="number"
                                       class="form-control @error('nb_children') is-invalid @enderror"
                                       name="nb_children"
                                       placeholder="Enfant(s)?"
                                       value="{{ old('nb_children') }}" autofocus>
                                @error('nb_children')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12 pe-0">
                                <button class="btn-primary-action col-12 m-0 mb-4" type="submit">
                                    Vérifier la disponibilité
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section>
            <div class="col-12">
                <h2 class="h5 mb-3">
                    <i class="fas fa-star fw-bold"></i>
                    <span class="rating fw-bold">5</span>
                    <span class="nbComment fw-bold">(18 commentaires)</span>
                </h2>
                <div class="rating">
                    <div class="row">
                        <div class="col-5 me-5">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <p>Propreté</p>
                                </div>
                                <div class="col-4">
                                    <div class="progress" style="height: 2px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    4.9
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
