<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products-style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <title>Phoenix Shop</title>
</head>
<body>
<div id="wrapper">
    @include("../navbar")

    <hr class="mb-2"/>

    <div class="d-flex flex-wrap justify-content-center">
        <div id="filters"></div>
        <div id="products" class="d-flex flex-wrap"></div>
        <nav id="paginate" class="d-flex flex-wrap justify-content-center"></nav>
    </div>
</div>

</body>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="{{ asset("js/products/list.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://kit.fontawesome.com/7779cbeb80.js" crossorigin="anonymous"></script>
</html>
