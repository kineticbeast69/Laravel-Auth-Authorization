<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-brand fs-2 fw-bold text-primary">{{$name}}-{{$role}}</div>
        <a class="d-flex text-decoration-none" role="search" href="{{route("logout")}}">
            @can("isAuthor")
                <a href="{{route("user")}}">
                    <button class="btn btn-success" type="submit">Back</button>
                </a>
            @endcan
            <button class="btn btn-success" type="submit">logout</button>
        </a>
    </div>
</nav>