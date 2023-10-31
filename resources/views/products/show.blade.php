<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products-show-style.css') }}">
    <title>Phoenix Shop - {{ $product->team }}</title>
</head>
<body>
<div id="wrapper">
    <div class="toast fade mx-auto" id="toast" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-stacking="true"
        data-mdb-autohide="true" data-mdb-delay="1000" data-mdb-append-to-body="true" data-mdb-width="350px"
    >
        <div class="toast-body">Produto adicionado ao carrinho!</div>
    </div>

    @include("../navbar")

    <hr class="mb-3"/>

    <div class="d-flex justify-content-center align-items-center">
        <div class="card">
            <input type="hidden" id="id" value="{{ $product->id }}" />
            <div class="card-body d-flex flex-wrap">
                <div class="product-img d-flex flex-wrap justify-content-end">
                    <a href="/products" class="btn-back me-5" role="button">
                        <i class="fa-solid fa-angle-left"></i> Voltar
                    </a>

                    <img id="main-img" class="float-end" src="{{ asset("img/$product->directory/1.jpg") }}" alt="">

                    <div class="d-flex justify-content-end mt-2">
                        <img class="mini-img me-1" src="{{ asset("img/$product->directory/1.jpg") }}" alt=""
                             onclick="toggleMainImg(this)">

                        <img class="mini-img me-1" src="{{ asset("img/$product->directory/1.jpg") }}" alt=""
                             onclick="toggleMainImg(this)">

                        <img class="mini-img" src="{{ asset("img/$product->directory/1.jpg") }}" alt=""
                             onclick="toggleMainImg(this)">
                    </div>
                </div>

                <div class="product-info">
                    <h2>{{ $product->team }}</h2>
                    <h5 class="mb-5">R$ {{ $product->price }}</h5>
                    <p class="mb-6">{!! $product->description !!}</p>

                    @php
                        $color = "";
                        foreach ($product->color as $c) {
                            !$color ? $color = Lang::get("colors.$c") : $color .= ", " . Lang::get("colors.$c");
                        }
                    @endphp

                    <table class="mb-6">
                        <tbody>
                        <tr>
                            <th>Cor:</th>
                            <td>{{ $color }}</td>
                        </tr>
                        <tr>
                            <th>Liga:</th>
                            <td>{{ Lang::get("league.$product->league") }}</td>
                        </tr>
                        <tr>
                            <th>Disponíveis:</th>
                            <td>{{ $product->storage }} unidade(s)</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="order-buttons">
                        <button id="buy" class="btn btn-dark me-2">
                           Comprar
                        </button>
                        <button id="add-cart" class="btn btn-light">
                            Adicionar ao carrinho
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="{{ asset("js/products/show.js") }}"></script>
<script src="{{ asset("js/utils.js") }}"></script>
</html>
