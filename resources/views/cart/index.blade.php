<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart-style.css') }}">
    <title>Phoenix Shop - Carrinho</title>
</head>
<body>
<div id="wrapper">
    @include("../navbar")

    <hr class="mb-3"/>

    <div class="d-flex justify-content-center align-items-center">
        <div id="main-card" class="d-flex flex-wrap flex-row">
            <div id="cart-list"></div>

            <div id="cart-details">
                <a href="/products" class="btn-back me-5 mb-5" role="button">
                    <i class="fa-solid fa-angle-left"></i> Voltar
                </a>

                <h4>Detalhes da compra</h4>

                <hr />
            </div>
        </div>
    </div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="{{ asset("js/cart/index.js") }}"></script>
<script src="{{ asset("js/utils.js") }}"></script>
</html>
