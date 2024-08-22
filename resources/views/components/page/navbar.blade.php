<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{ config("app.name") }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Start </a>
            </li>

            @can("file")
                <li class="nav-item active">
                    <a class="nav-link" href="/edit/file">Dokumente verwalten </a>
                </li>
            @endcan

            @can("admin.user")
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Verwaltung
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/user">Benutzer</a>
                        <a class="dropdown-item" href="/role">Rollen</a>
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
                    </div>
                </li>
            @endcan
           {{-- --}}
            <li class="nav-item">
                <form action="/logout" method="POST"> @csrf <button class="nav-link" type="submit">Abmelden</button></form>
            </li>
        </ul>

    </div>
</nav>
