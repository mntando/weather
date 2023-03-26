<!DOCTYPE html>

<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width">

        <!-- http://getbootstrap.com/docs/5.1/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <!-- -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.js"></script>

        <!-- icon -->
        <link href="/static/weather0.webp" rel="icon">

        <link href="/static/styles.css" rel="stylesheet">
        <script src="/static/script.js" type="text/javascript"></script>

        <title>@yield('title')</title>

    </head>

    <body class="bg-dark">

        <nav class="bg-info bg-gradient bg-opacity-10 border border-light border-opacity-25 rounded-corners navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><span class="blue">WE</span><span class="red">A</span><span class="yellow">TH</span><span class="green">ER</span><span class="red">50!</span></a>
                <div class="navbar-collapse" id="navbar">
                    <!-- Get location from user -->
                    <ul class="navbar-nav ms-auto mt-2">
                        <li class="nav-item pr">
                            <form action="/" method="get">
                                <input autofocus autocomplete="off" class="bg-light border border-dark form-control rounded-2 pl" id="input" list="locations" name="q" oninput="onInput()" placeholder="Location" type="text">
                                <datalist id="locations"></datalist>
                            </form>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-link" onclick="locate()">Auto</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 text-center">
            @yield('main')
        </main>

        <footer class="mb-5 small text-start">
            Data provided by <a href="https://openweathermap.org/api" rel="noopener noreferrer" target="_blank">Openweathermap</a>
            <p>&copy; 2022 mvuselelontandondhlovu</p>
        </footer>

    </body>
</html>