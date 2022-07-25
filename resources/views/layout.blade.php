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
    <span style="font-size:30px;cursor:pointer; margin-right: 15px"  onclick="openNav()">☰</span> <p class="h5 my-0 mr-md-auto fw-normal"><a class="text-decoration-none" style="color: white;" href="{{route('main')}}">Wine Room</a></p>

    @auth()
        @isset($isadmin)
            @if($isadmin)
    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Адмін
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('addwine')}}">Додавання вина</a></li>
            <li><a class="dropdown-item" href="{{route('Orders')}}">Замовлення</a></li>
            <li><a class="dropdown-item" href="{{route('infoContact')}}">Повідомлення</a></li>
            <li><a class="dropdown-item" href="{{route('addAccessories')}}">Додавання аксесуарів</a></li>
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
            @endif
        @endisset
    @endauth

    <nav class="my-2 my-md-0 me-md-3">
        <a class="p-2 text-white" href="/about">Про нас</a>

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

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-2 sm:block">
                @auth
                    <button type="button" class="btn btn-secondary" style="margin-right: 10px; margin-left: 10px">
                    <a href="{{ url('/home') }}" class="text-sm text-white-700 underline" style="color: white">Кабінет</a>
                    </button>
                @else
                    <button type="button" class="btn btn-secondary" style="margin-right: 10px; margin-left: 10px">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="color: white">Авторизація</a>
                    </button>
                    <button type="button" class="btn btn-secondary" style="margin-right: 10px; margin-left: 10px">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class=" text-sm text-gray-700 underline" style="color: white">Реєстрація</a>
                    </button>
                    @endif
                @endauth
            </div>
        @endif

    <a href="/basket" style=" color: white" >
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
        <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
    </svg> </a>

</header>

<main class="container">

@yield('main_content')

</main>
<hr class="featurette-divider">
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <img width="24" height="24" src="https://img.icons8.com/pastel-glyph/64/000000/wine-and-grapes.png"/>
            <small class="d-block mb-3 text-muted">© 2022</small>
        </div>
        <div class="col-6 col-md">
            <h5>Магазин</h5>
            <ul class="list-unstyled text-small">
                <li><a class="link-secondary" href="#">Про нас</a></li>
                <li><a class="link-secondary" href="#">Оплата і доставка</a></li>
                <li><a class="link-secondary" href="#">Рейтинг</a></li>
                <li><a class="link-secondary" href="#">Акції</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Оплата</h5>
            <ul class="list-unstyled text-small">
                <li><img src="https://img.icons8.com/ios-filled/48/000000/apple-pay.png"/></li>
                <li><img src="https://img.icons8.com/color/48/000000/visa.png"/></li>
                <li><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Контакти</h5>
            <h5>0990780289</h5>
            <ul class="list-unstyled text-small">
              <a href="https://uk-ua.facebook.com" target="_blank" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg></a>
                <a href="https://www.instagram.com/?hl=ru" target="_blank" class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg></a>
                    <a href="https://web.telegram.org/#/login" target="_blank" class="text-info"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                    </svg></a>
                        <a href="https://www.youtube.com/?hl=uk&gl=UA" target="_blank" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.122C.002 7.343.01 6.6.064 5.78l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                    </svg></a>
            </ul>
        </div>
    </div>
</footer>
<button onclick="topFunction()" id="myBtn" title="На початок" class="btn-danger"><img src="https://img.icons8.com/ios/30/000000/circled-chevron-up.png"/></button>
<script>
    var mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<style>
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 100px;
    }
    #myBtn:hover {
        background-color: #555;
    }
</style>
<style>
    /* Боковое навигационное меню */
    .sidenav {
        height: 100%; /* 100% Full-height */
        width: 0; /* 0 ширина - изменить это с помощью JavaScript */
        position: fixed; /* Оставайтесь на месте */
        z-index: 1; /* Оставайтесь сверху */
        top: 0; /* Оставайтесь наверху */
        left: 0;
        background-color: #6e7872; /* Фон черный*/
        overflow-x: hidden; /* Отключить горизонтальную прокрутку */
        padding-top: 60px; /* Поместите контент в 60px сверху */
        transition: 0.5s; /* 0.5 второй эффект перехода слайда в боковой навигации */
    }

    /* Ссылки меню навигации */
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 23px;
        color: #fafafa;
        display: block;
        transition: 0.3s;
    }

    /* Когда вы наводите курсор мыши на навигационные ссылки, изменяется их цвет */
    .sidenav a:hover {
        color: #d95a5a;
    }

    /* Положение и стиль кнопки закрытия (верхний правый угол) */
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    /* На экранах меньшего размера, где высота меньше 450px, измените стиль sidenav (меньше отступов и меньший размер шрифта) */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
    .dropbtn {
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: relative;
        background-color: #828e88;
        min-width: 199px;
        box-shadow: 0px 2px 12px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

</style>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="/">Головна</a>
    <div class="dropdown">
        <a class="dropbtn" href="/Accessories">Аксесуари</a>
        <div class="dropdown-content">
            <a href="/bokal">Бокал</a>
            <a href="/dekan">Декантер</a>
            <a href="/upakov">Упаковка</a>
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "200px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
</body>


</html>
