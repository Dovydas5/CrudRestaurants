
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-header text-center h4">{{$restaurant->title}}</div>
                            <div class="card-body">Žmonių kiekis telpantis restorane: {{$restaurant->customers}} </div>
                            <div class="card-body">Darbuotojų kiekis: {{$restaurant->employees}}</div>
                            <div class="card-text h3">Apie patiekalą:</div>

                            <div class="card-body">Patiekalo pavadinimas: {{$restaurant->getMenu->title}}</div>
                            <div class="card-body">Kaina: {{$restaurant->getMenu->price}} &#8364</div>
                            <div class="card-body">Porcijos svoris: {{$restaurant->getMenu->weight}} g</div>
                            <div class="card-body">Mėsos kiekis porcijoje: {{$restaurant->getMenu->meat}} g</div>
                            <div class="card-body">Patiekalo aprašymas:{!! $restaurant->getMenu->about !!}</div>
                            <a href="{{route('restaurant.index')}}" class="btn btn-primary">Atgal</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
