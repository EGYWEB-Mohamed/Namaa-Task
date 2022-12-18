<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" integrity="sha512-0p3K0H3S6Q4bEWZ/WmC94Tgit2ular2/n0ESdfEX8l172YyQj8re1Wu9s/HT9T/T2osUw5Gx/6pAZNk3UKbESw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest('subscriber')
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subscriber.login') }}">{{ __('Subscriber Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('subscriber')->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('front') }}">Home</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('subscriber.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest


                @guest('web')
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('web')->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('subscriber.index') }}">Admin Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js" integrity="sha512-lOrm9FgT1LKOJRUXF3tp6QaMorJftUjowOWiDcG5GFZ/q7ukof19V0HKx/GWzXCdt9zYju3/KhBNdCLzK8b90Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    function getAlert(icon = 'success',title) {
        new Noty({
            closeWith: ['click', 'button'],
            layout   : 'bottomRight',
            progressBar: true,
            timeout: 3000,
            type: icon,
            text: title
        }).show();
    }
</script>
@stack('js')
</body>
</html>
