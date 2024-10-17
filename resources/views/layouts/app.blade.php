<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



</head>

<body>
    <!-- Navigation button -->
    <div class="navbar-tp">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <span class="navbar-toggler-icon"></span>
            </button><a class="navbar-brand text-white" style="padding-left: 20px;" onclick="qc.loadPage('index')">
                <!-- <img src="" width="30" height="30" alt=""> -->
                NIHON SEIKI THAI </a>
            <div class="navbar-collapse collapse w-100 order-0 dual-collapse2">
            </div>
            <div class="navbar-collapse collapse w-100 order-2 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <a class="navbar-brand text-white" style="cursor: pointer;">
                        <!-- <img src="" width="30" height="30" alt=""> -->
                        Patrol</a>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navigation button END -->

    <div class="container-fluid" style="padding-top: 10px; height: 100%;">
        <div class="row" id="displayPlatforms" style="height: inherit;">
            <div class="col col-md-auto menu" id="collapseOne">
                <div style="width: min-content; background-color: white; margin: 0 auto;">

                    @guest
                    @if (Route::has('login'))
                    @endif
                    @else
                    <a class="btn btn-light" style="width: 250px; padding: 0; margin: 0;" href="/">
                        <div class="card self-align-center" id="show-profile" style="align-items: center;">
                            <h4>{{ Auth::user()->name }}</h4>
                            <p class="title">{{ Auth::user()->role }}</p>
                        </div>
                    </a>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group" style="width: 250px; padding: 0; margin: 0;">

                        <div class="btn-group" role="group">
                            {{-- <button type="button" class="btn dropdown-toggle text-start fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-database fa-lg"></i>&nbsp;&nbsp;Master
                            </button> --}}
                            <ul class="dropdown-menu" style="width: 250px; padding: 0; margin: 0;">
                                <li><a class="dropdown-item text-start fs-5" href="/users"><i class="fas fa-address-book fa-lg"></i>&nbsp;&nbsp;Users</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/vendors"><i class="fas fa-building fa-lg"></i>&nbsp;&nbsp;Vendors</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/test_methods"><i class="fas fa-ruler fa-lg"></i>&nbsp;&nbsp;Equipment Names</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/brands"><i class="fas fa-copyright fa-lg"></i>&nbsp;&nbsp;Brands</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/locations"><i class="fas fa-location-dot fa-lg"></i>&nbsp;&nbsp;Locations</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/standards"><i class="fas fa-certificate fa-lg"></i>&nbsp;&nbsp;Standards</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn text-start fs-5">
                            <a class="dropdown-item text-start fs-5" href="/machine"><i class="fas fa-microscope fa-lg"></i>&nbsp;&nbsp;Machine</a></button>
                        <button type="button" class="btn text-start fs-5">
                            <a class="dropdown-item text-start fs-5" href="/process_lines"><i class="fas fa-screwdriver-wrench fa-lg"></i>&nbsp;&nbsp;Process Lines</a></button>
                        {{-- <div class="btn-group" role="group">
                            <button type="button" class="btn dropdown-toggle text-start fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-print fa-lg"></i>&nbsp;&nbsp;Report
                            </button>
                            <ul class="dropdown-menu" style="width: 250px; padding: 0; margin: 0;">
                                <li><a class="dropdown-item text-start fs-5" href="/report_tools">
                                        <i class="fas fa-print fa-lg"></i>&nbsp;&nbsp;Report Tools</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/report_over_due">
                                        <i class="fas fa-print fa-lg"></i>&nbsp;&nbsp;Report Over Due</a></li>
                                <li><a class="dropdown-item text-start fs-5" href="/report_tool_due">
                                        <i class="fas fa-print fa-lg"></i>&nbsp;&nbsp;Report Tool Due</a></li>
                            </ul>
                        </div> --}}
                        <button type="button" class="btn text-start fs-5">
                            <a class="dropdown-item text-start fs-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-right-from-bracket fa-lg"></i>&nbsp;&nbsp;Logout
                            </a></button>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @endguest
                </div>
            </div>
            <div class="col" style="overflow: hidden;">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
