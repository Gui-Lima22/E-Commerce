<nav class="navbar navbar navbar-expand-lg navbar-light">
    <div class="col-3 d-flex flex-wrap align-items-center justify-content-center">
        @if (isset($productsList))
            <a href="#filters" aria-expanded="true" aria-controls="teamsCollapse" data-mdb-toggle="collapse"
               role="button" style="cursor: pointer;" onclick="toggleFilter()">
                <i class="fa-solid fa-bars"></i>
            </a>
        @endif
        <h2 class="actual-title title mt-2">Phoenix Shop</h2>
    </div>
    <div class="col-9">
        <ul class="nav float-end">
            @if (!isset($home))
                <li class="nav-item me-2">
                    <a href="/" role="button">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
            @endif
            <li class="nav-item me-2" style="margin-top: 0.7rem !important;">
                <div class="collapse" id="searchToggle">
                    <div class="form-outline">
                        <input class="form-control" type="text" id="search">
                        <label class="form-label" for="search" style="margin-left: 0;">Pesquisar</label>
                    </div>
                </div>
            </li>
            <li class="nav-item mt-2">
                <button class="btn btn-nav" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#searchToggle" aria-controls="searchToggle" aria-expanded="false"
                        aria-label="Toggle navigation" data-mdb-ripple-color="dark">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 1.25rem;"></i>
                </button>
            </li>
            <li class="nav-item me-2">
                <button type="button" class="btn btn-nav float-end me-2">
                    <i class="fa-solid fa-bag-shopping" style="font-size: 1.9rem;"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>
