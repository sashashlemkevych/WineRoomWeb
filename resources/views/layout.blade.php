<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-danger text-white border-bottom shadow-sm">
    <p class="h5 my-0 mr-md-auto fw-normal"><a class="text-decoration-none" style="color: white;" href="{{route('main')}}">Wine Room</a></p>
    @auth()
    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Адмін
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('addwine')}}">Добавлення</a></li>
            <li><a class="dropdown-item" href="{{route('Orders')}}">Замовлення</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Вихід
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form></li>
        </ul>
    </div>
    @endauth
    <nav class="my-2 my-md-0 me-md-3">
        <a class="p-2 text-white" href="/">Головна</a>
        <a class="p-2 text-white" href="/about">Про нас</a>
        <a class="p-2 text-white" href="/basket">Кошик</a>
    </nav>
    <form class="d-flex" type="get" action="{{route('search')}}">
        @csrf
        <input  name="search" class="form-control me-2" type="search" placeholder="Пошук товарів" aria-label="Search">
        <button type="submit" class="btn btn-secondary" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" color="danger">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
        </button>
    </form>
</header>

<main class="container">

@yield('main_content')

</main>
<hr class="featurette-divider">
<footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="float-end"><a href="#">^</a></p>
        <p>©2021</p>
</footer>
</body>
</html>
