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



                    <h1><a href="{{route("series")}}">Explorer</a></h1>
                    @if(Auth::user()!=null)
                        <h1><a href="{{url("/user/".Auth::user()->id)}}">Voir compte</a></h1>
                    @else
                        <h1><a href="{{route("login")}}">Se connecter</a></h1>
                    @endif
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


        <p id="slogan">Watch it, and let's talk about it!</p>

        <img src="https://popupfilmresidency.org/wp-content/uploads/2019/05/white-down-arrow-png-2.png" id="arrow">



        <div class="sliders">

            <h1 id="slider_title">Nos dernières critiques</h1>

            <div class="first_slider">
                @foreach($commentaireRecent as $com)
                    <div><img src="{{url("$com->urlImage")}}"><div class="slider_hover"><a href="{{url("/series/$com->id")}}">Voir</a></div></div>
                @endforeach

            </div>

            <h3><a href="{{route("series")}}">Tout voir</a></h3>


            <h1 id="slider_title">Les mieux notés</h1>

            <div class="second_slider">

                @foreach($serieRecente as $serie)
                    <div><img src="{{url("$serie->urlImage")}}"><div class="slider_hover"><a href="{{url("/series/$serie->id")}}">Voir</a></div></div>
                @endforeach

            </div>

            <h3><a href="{{route("series")}}">Tout voir</a></h3>


            <h1 id="slider_title">Nos critiques vidéo</h1>

            <div class="third_slider">

                <div>
                    <div><a href="https://www.youtube.com/watch?v=zIVQlObaLIs&feature=youtu.be&fbclid=IwAR0IkQ6pxgVhj2XnWtaFaubqj_hAEDMZFJlQMEVPujPPnMtFpbzsG8QvZZ8"><img src="{{url("img/bojackart.png")}}" width="100%"> </a></div>
                </div>
                <div><a href="https://www.youtube.com/watch?v=gj8WqYTFgzM&feature=youtu.be&fbclid=IwAR04HSCozjtZOnzM-FDsExqxz3CKe1H9cvjjWKtqlor6-B-zUoFyEafCDEA"><img src="{{url("img/thecrowart-02.png")}}" width="100%"> </a></div>

            </div>
        </div>



    </div>
</div>
</body>

</html>