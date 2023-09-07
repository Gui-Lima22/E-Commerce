<!
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <title>Phoenix Shop</title>
</head>
<body>
<nav class="navbar navbar navbar-expand-lg navbar-light">
    <div class="col-3 text-center">
        <h2 class="actual-title title mt-2">Phoenix Shop</h2>
    </div>
    <div class="col-9">
        <ul class="nav float-end">
            <li class="nav-item me-2" style="margin-top: 0.7rem !important;">
                <div class="collapse" id="searchToggle">
                    <div class="form-outline">
                        <input class="form-control" type="text" id="search">
                        <label class="form-label" for="search" style="margin-left: 0px;">Pesquisar</label>
                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>
                </div>
            </li>
            <li class="nav-item me-4 mt-2">
                <button class="btn btn-floating" type="button" data-mdb-toggle="collapse" data-mdb-target="#searchToggle" aria-controls="searchToggle" aria-expanded="false" aria-label="Toggle navigation" data-mdb-ripple-color="dark">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 1.25rem;"></i>
                </button>
            </li>
            <li class="nav-item me-2">
                <button type="button" class="btn btn-dark btn-rounded float-end me-2" data-mdb-ripple-color="dark">
                    <i class="fa-solid fa-bag-shopping" style="font-size: 2.25rem;"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>

<div class="bg-image">
    <img src="{{ asset("img/teste.jpg") }}" alt="">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1>Lojinha On-Line</h1>
            </div>
        </div>
    </div>
</div>

</body>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://kit.fontawesome.com/7779cbeb80.js" crossorigin="anonymous"></script>
</html>
