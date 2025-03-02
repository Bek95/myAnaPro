<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title : 'Url ShortCut' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" href="{{ asset('images/icones/favico.png') }}">
        <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">


    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">


                        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-scroll">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#"><img src="{{ asset('images/ninja.jpg') }}" alt="logo" style="height: 60px"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="{{ route('url_shortener.index') }}">Urls Raccourcies</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="{{ route('url_shortener.create') }}">Raccourcir une Url</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>
                    @include('messages.message')
                        @yield('content')
                    <footer class="d-flex justify-content-center p-5">
                        <div>
                            <p>{{ date('Y')}} @ UrlShorCut</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        @stack('scripts')
    </body>
</html>
