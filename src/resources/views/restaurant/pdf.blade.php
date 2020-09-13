<!doctype html>
<html class="no-js" lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <style type="text/css">
        * {
            font-family: "DejaVu Sans Mono", monospace;
        }
    </style>
</head>
<body>

                        <h1>{{$restaurant->title}}</h1>
                        <div class="card-body">Žmonių kiekis telpantis restorane: {{$restaurant->customers}} </div>
                        <div class="card-body">Darbuotojų kiekis: {{$restaurant->employees}}</div>
                        <div class="card-text h3">Apie patiekalą:</div>

                        <div class="card-body">Patiekalo pavadinimas: {{$restaurant->getMenu->title}}</div>
                        <div class="card-body">Kaina: {{$restaurant->getMenu->price}} &#8364</div>
                        <div class="card-body">Porcijos svoris: {{$restaurant->getMenu->weight}} g</div>
                        <div class="card-body">Mėsos kiekis porcijoje: {{$restaurant->getMenu->meat}} g</div>
                        <div class="card-body">Patiekalo aprašymas:{!! $restaurant->getMenu->about !!}</div>

</body>
</html>
