<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forum | Bienvenue sur votre forum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
            <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <div class= 'container'>
            <div class="container_content">
                <div class="container_content_inner">
                    <div class="title">
                        <h1>Forum</h1>
                    </div>
                    <div class="par">
                        <p>
                            Bienvenue sur votre forum! <br>
                            Participez aux forums Films, partagez avec des milliers de passionnés, chaque jour, vos questions, vos rêves, vos expériences, vos demandes d'informations ou vos impressions grâce à ForumN.
                        </p>
                    </div>
                    <div class="btns">
                        @if (Route::has('login'))
                        @auth
                                <a href="{{ url('/dashboard') }}" class='btns_more'>Tableau de bord</a>
                        @else

                            <div class="twoLinks">
                                <a href="{{ route('login') }}" class='btns_more'> Se connecter </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class='btns_more'> S'inscrire </a>
                            </div>
                            @endif
                        @endauth
                    @endif
                    </div>
                </div>
            </div>
            <div class="container_outer_img">
                <div class="img-inner">
                    <img src='https://logos-world.net/wp-content/uploads/2020/04/Netflix-Symbol.png'  alt="" class="container_img"/>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </body>
</html>
