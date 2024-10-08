<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <!-- Jquery Add -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        button.nav-link {
            border: 0px;
            background: transparent;
        }
    </style>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('shops.index')  }}">Shops</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index')  }}">Proucts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('compare.index')  }}">Compare</a></li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                @guest
                    <li  class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li  class="nav-item">
                        <form method="post" id="logouth" action="{{route('auth.logout')}}">
                            @csrf
                            <button class="nav-link" type="submit" id="logout">Logout</button>
                        </form>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link" href="{{ route('auth.profile') }}">{{ Auth::user()->name  }} personal</a>
                    </li>
                @endauth

            </ul>
            <!--
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
            -->
        </div>
    </div>
</nav>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        {{ $slot }}
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>

    <script type="text/javascript">
        /*$(document).ready(function (){
            $('#logout').submit(function (event){
                event.preventDefault();
                let url = $(this).data('url');
                $.post(url, $(this).serialize(), function (){
                    window.location.href = '/';
                });
                return false;
            });
        });*/
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/js/scripts.js"></script>
</body>
</html>
