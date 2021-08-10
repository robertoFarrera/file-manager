<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/cover.css')}}">
    <script src="{{mix('js/app.js')}}" defer></script>
</head>

<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-center">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">{{ config('app.name', 'Laravel') }}</h3>
                @if(Route::has('login'))
                <nav class="nav nav-masthead justify-content-center">
                    @auth
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @endif
                    @endif
                </nav>
                @endif
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Simple File Manager System</h1>
            <p class="lead">Use and modify this code as your convenience.</p>
            <p class="lead">
                <a target="_blank" href="https://github.com/robertoFarrera/file-manager" class="btn btn-lg btn-secondary">
                    <svg style="width: 1.4rem; height: 1.4rem;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    Go to Repo
                </a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a
                        href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
        </footer>
    </div>

    <footer class="pt-4">
        <div class="text-center smal text-white-50">
            <p>Created with &#10084; by <a target="_blank" href="https://twitter.com/robert_farrera">Robert Farrera</a></p>
            <p>Running on Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>

</body>

</html>