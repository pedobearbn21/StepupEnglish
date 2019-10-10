<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://apis.google.com/js/api.js" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
</head>
<body class='backgroundcard'>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-position "> -->
        <!-- <nav class="navbar navbar-light"> -->
        <div id="mySidenav" class="sidenav bodycard" style='bordor:none;' >
            <navcard-component></navcard-component>
        </div>

            <nav class='navbar-light'>
            <nav class='top-right links navbar-position bodycard'>
                <div class="py-2 mx-4">
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel')    }}
                    </a> -->
                    <!-- <button class=" openbtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                        &#9776;
                    </button> -->
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                        <!-- Left Side Of Navbar -->
                        <!-- <ul class="navbar-nav ml-auto">

                        </ul> -->

                        <!-- Right Side Of Navbar -->
                        <!-- <ul class="navbar-nav ml-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul> -->
                    <!-- </div> -->
                </div>
            </nav>
        <main class="py-4 full-height">
        <router-view></router-view>
        <b-modal id="my-modal" class="">
        <div>
                <input id='a' type="text" class="form-control"  placeholder="Enter Text To Translate">
        </div>
        <div class="mt-4 mb-2" style="text-align-last:center !important;">
            <button type="button" class="btn btn-outline-success btn-sm pr-1"
                onclick="trans(from_lang='th',to_lang='en');">TH to EN
            </button>
            <button type="button" class="btn btn-outline-warning btn-sm pl-1"
                onclick="trans(from_lang='en',to_lang='th')">En to TH</button>
        </div>
        <div>
                <label for="exampleInputEmail1">Meaning :</label>
                <textarea type="text" class="form-control" id="b" placeholder="Mean of Words"></textarea>
        </div>
        </b-modal>
            @yield('content')

        </main>
        <div class="fixed-bottom">
            <div class="float-right">
                <layout-component></layout-component>
            </div>
        </div>


    </div>
    <script>
        function trans(from_lang,to_lang){
            translate(a.value, b, from_lang, to_lang);
        }
        function translate(sentences, targetDiv, from_lang ='en', to_lang='th'){
            var text ='';
            sentences = sentences.replace(/\n/g, '<br>')
            let endPoint = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${from_lang}&tl=${to_lang}&dt=t&ie=UTF-8&oe=UTF-8&q=${encodeURIComponent(sentences)}` ;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var jsonText = JSON.parse(this.responseText);
                text = jsonText[0][0][0]
                text = text.replace(/<br>/g, '\n')
                targetDiv.innerHTML = "&nbsp;" + text;
            }
            };
            xhttp.open("GET", endPoint, true);
            xhttp.send();
        }
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
    </script>
</body>
</html>
