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
    <link rel="stylesheet" href="{{ asset('css/list-style.css') }}">
    <title>Phoenix Shop</title>
</head>
<body>
<div id="wrapper">
    @include("../navbar", ["productsList" => true])

    <hr class="mb-2"/>

    <div class="d-flex flex-wrap justify-content-center">
        <div id="filters" class="collapse show" style="transition: none;">
            <div class="card filters-card">

                <h4 class="filters-h4" style="padding: 15px 0 0 15px;">Filtros</h4>

                <hr/>

                <ul class="filters-list">
                    <li class="filters-items">
                        <a href="#teamsCollapse" id="teams" class="ripple-surface collapse-active w-100"
                           onclick="toggleItem(this)" role="button"
                           aria-expanded="true" aria-controls="teamsCollapse" data-mdb-toggle="collapse">
                            Times <i class="fa fa-angle-up float-end"></i>
                        </a>
                        <ul id="teamsCollapse" class="list-collapse collapse show mt-2">
                            @foreach($all as $item)
                                <li class="item-list">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  onclick="search()"
                                               id="{{ $item->directory }}-{{ $item->id }}" name="{{ $item->directory }}"
                                        />
                                        <label class="form-check-label" for="{{ $item->directory }}-{{ $item->id }}">
                                            {{ $item->team }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="filters-items">
                        <a href="#leaguesCollapse" id="leagues" class="ripple-surface w-100"
                           onclick="toggleItem(this)" role="button"
                           aria-expanded="false" aria-controls="leaguesCollapse" data-mdb-toggle="collapse">
                            Liga <i class="fa fa-angle-down float-end"></i>
                        </a>
                        <ul id="leaguesCollapse" class="list-collapse collapse mt-2">
                            @foreach($leagues as $league)
                                <li class="item-list">
                                    <input class="form-check-input" type="checkbox" id="{{ $league['id'] }}"
                                           name="{{ $league['id'] }}" onclick="search()"
                                    />
                                    <label class="form-check-label" for="{{ $league['id'] }}">
                                        {{ $league['text'] }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="filters-items">
                        <a href="#colorsCollapse" id="colors" class="ripple-surface w-100"
                           onclick="toggleItem(this)" role="button"
                           aria-expanded="false" aria-controls="colorsCollapse" data-mdb-toggle="collapse">
                            Cores <i class="fa fa-angle-down float-end"></i>
                        </a>
                        <ul id="colorsCollapse" class="list-collapse collapse mt-2">
                            @foreach($colors as $color)
                                <li class="item-list">
                                    <input class="form-check-input" type="checkbox" id="{{ $color['id'] }}"
                                           name="{{ $color['id'] }}" onclick="search()"
                                    />
                                    <label class="form-check-label" for="{{ $color['id'] }}">
                                        {{ $color['text'] }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="filters-items">
                        <a href="#orderByCollapse" id="orderBy" class="ripple-surface w-100"
                           onclick="toggleItem(this)" role="button"
                           aria-expanded="true" aria-controls="orderByCollapse" data-mdb-toggle="collapse">
                            Ordenar por <i class="fa fa-angle-down float-end"></i>
                        </a>
                        <ul id="orderByCollapse" class="list-collapse collapse show mt-2">
                            <li class="item-list">
                                <input class="form-check-input" type="radio" id="relevance" name="orderBy" onclick="search()" checked/>
                                <label class="form-check-label" for="relevance">Relevância</label>
                            </li>
                            <li class="item-list">
                                <input class="form-check-input" type="radio" id="name" name="orderBy" onclick="search()"/>
                                <label class="form-check-label" for="name">Nome</label>
                            </li>
                            <li class="item-list">
                                <input class="form-check-input" type="radio" id="low-price" name="orderBy" onclick="search()"/>
                                <label class="form-check-label" for="low-price">Menor preço</label>
                            </li>
                            <li class="item-list">
                                <input class="form-check-input" type="radio" id="biggest-price" name="orderBy" onclick="search()"/>
                                <label class="form-check-label" for="biggest-price">Maior preço</label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div id="products" class="d-flex flex-wrap"></div>

        <nav id="paginate"></nav>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset("plugins/mdb/js/mdb.min.js") }}"></script>
<script src="{{ asset("js/products/list.js") }}"></script>
</html>
