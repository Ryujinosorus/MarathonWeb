<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">

    <title>Watch it!</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

<div class="background">
    <img src="{{url("/img/bg.png")}}" id="background_image">
    <div id="filtre"></div>
    <div id="text">

        <header class="header">

            <a href="{{url("/")}}"><p>Watch it!</p></a>

            <nav>
                <div class="recherche">


                    <h1><a href="/series">Explorer</a></h1>
                    <h1>Bonjour ! </h1>

                            <form method="post">
                                <style>
                                    .recherche form{
                                        margin-top: 4rem;
                                    }
                                </style>
                                <input type="text" name="search">
                                <input type="submit" alt="OK" value="OK">
                            </form>

                </div>
            </nav>

        </header>

        <div class="navbar">
            <div class="navbar-inner">
            </div>
        </div>
        @if(Auth::user()!=null)
        <div class="container profile">


            <div class="presentation_utilisateur">
                <div id="img_flex_utilisateur">
                    <img src="{{url("/img/bg.png")}}">
                </div>
                <div id="info_flex_utilisateur">
                    <h1>{{ $name }}</h1>
                    <p><i>"Watch it, and let's talk about it !"</i></p>
                </div>
            </div>

            <img src="https://popupfilmresidency.org/wp-content/uploads/2019/05/white-down-arrow-png-2.png" id="arrow">


            <div class="visionage">
                <span id="heures_num">{{$nbEpisodeVue}}<span id="heures">heures</span></span>
                <p>de visionage total</p>
                <span id="heures_num">{{$watchingTime}}<span id="heures">épisodes</span></span>
                <p>visionnés au total</p>
            </div>


            <div class="progression">

                <div class=""><h2>Serie 1</h2><progress max="100" value="80"></progress></div>
                <div class=""><h2>Serie 2</h2><progress max="100" value="40"></progress></div>
                <div class=""><h2>Serie 3</h2><progress max="100" value="60"></progress></div>
                <div class=""><h2>Serie 4</h2><progress max="100" value="90"></progress></div>
                <div class=""><h2>Serie 5</h2><progress max="100" value="50"></progress></div>
                <div class=""><h2>Serie 6</h2><progress max="100" value="40"></progress></div>
            </div>
        </div>
        @else
            <div id="info_flex_utilisateur">
                <h1>Erreur!</h1>
                <p><i>Vérifier que vous êtes bien connectée</i></p>
            </div>
        @endif


        @if(count($allComm)==0)
            <h1 id="title_user_critic">Aucune critique</h1>
        @else
            <h1 id="title_user_critic">Vos critiques</h1>
        @endif
        @foreach($allComm as $com)
        <div class="critique_utilisateur_div">
            <div class="nom_serie_critique_utilisateur">
                <h>{{$com->nom}}</h>
            </div>
            <div>
                <div class="critique_contenu">
                    <p>{{$com->content}}
                    </p>
                    <div class="critique_info_utilisateur">
                        <h3>{{$com->created_at}}</h3>
                        <h4>{{$com->note}}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach




</body>
</html>