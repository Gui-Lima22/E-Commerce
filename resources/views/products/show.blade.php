<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar-style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <title>Phoenix Shop - {{ $product->team }}</title>
</head>
<body>
<div id="wrapper">
    @include("../navbar")

</div>

</body>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://kit.fontawesome.com/7779cbeb80.js" crossorigin="anonymous"></script>
</html>
