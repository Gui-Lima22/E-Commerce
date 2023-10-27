<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-style.css') }}">
    <title>Phoenix Shop</title>
</head>
<body>
<div id="wrapper">
    @include("../navbar", ["home" => true])

    <div class="bg-image">
        <img src="{{ asset("img/background.jpg") }}" alt="" style="width: auto; height: calc(100vh - 70px);">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="title-div">
                <h1 id="page-title" class="text">Sport Collection</h1>
                <button class="btn home-btn float-end" onclick="window.top.location = '/products'">
                    Produtos
                </button>
            </div>
        </div>
    </div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
</html>
