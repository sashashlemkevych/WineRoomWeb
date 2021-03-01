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
    <div class="container">
    <h3 style="color: black">Контакти</h3>
    <p style="color: black">Будемо раді відповісти  на ваші запитання</p>
    <input type="text" name="name" id="name" placeholder="Ім'я">
    <input type="text" name="phone" id="phone" placeholder="Телефон">
    <input type="email" name="email" id="email" placeholder="Пошта"><br>
    <textarea style="margin: 10px" name="massage" placeholder="Опис вина"></textarea><br>
    <button type="submit" class="btn btn-danger">Відправити</button>
    </div>
    <a style="float:right; padding: 15px; color: black;" href="#"><svg style="width: 25px; height: 25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354
            7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
        </svg></a>
</footer>
</body>
</html>
