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



                    <h1><a href="{{url('/series')}}">Explorer</a></h1>
                    <h1>

                        @if(Auth::user()!=null)
                            <h1><a href="{{url("/user/".Auth::user()->id)}}">Voir compte</a></h1>
                        @else
                            <h1><a href="{{route("login")}}">Se connecter</a></h1>
                        @endif
                    </h1>

                            <form method="post">
                                <input type="text" name="search">
                                <input type="submit" alt="OK" value="OK">
                            </form>

                </div>
            </nav>

        </header>


        <div class="liste_series">
            @foreach($Images as $image)
                <div> <a href="{{url("/series/$image->id")}}"> <img src="{{url("$image->urlImage")}}"> </a> </div>
            @endforeach
        </div>

</body>
</html>