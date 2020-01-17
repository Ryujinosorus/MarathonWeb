<!DOCTYPE html>
<htmllang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">

    <title>Watch it!</title>
    <script src="/js/jquery.js"></script>
    <link href="{{ asset('css/style.css') }}"rel="stylesheet">

</head>

<body>

<div class="background">
    <img src="{{url("/img/bg.png")}}" id="background_image">
    <div id="filtre"></div>
    <div id="text">

        <header class="header">

            <a href="{{url('/')}}"><p>Watch it!</p></a>

            <nav>
                <div class="recherche">



                    <h1><a href="{{url("/series")}}">Explorer</a></h1>
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

        <div class="presentation">

            <div class="test">
                <img src="{{url($serie->urlImage)}}">
            </div>

            <div class="presentation_contenu">
                <h1>{{$serie->nom}}</h1>
                <h2>{{$serie->note}} /10</h2>
                <h3>{{$serie->premiere}}</h3>

                {!! $serie->resume !!}
                <a href="{{url("/serie/$serie->id")}}"> <h2>Modifier</h2></a>
            </div>

        </div>


        <img src="https://popupfilmresidency.org/wp-content/uploads/2019/05/white-down-arrow-png-2.png" class="presentation_arrow">



        <div class="critique">


            <div class="critique_redac">
                @if(($serie->avis))
                <h1>Critique de la rédaction</h1>

                <div class="critique_redac_contenu">
                    <h2>Notre avis sur {{$serie->nom}}</h2>
                    <p>{{$serie->avis}}
                    </p>

                </div>
                @else
                    <h1>La rédaction n'as pas encore jugé cette série</h1>
                @endif

            </div>



            <div class="critique_utilisateur">
                <h1>Critiques des utilisateurs</h1>
                @if(empty(Auth::user()) || !Auth::user()->administrateur)

                    @foreach($comments as $comment)

                        @if($comment->validated)
                            <div class="critique_contenu">
                                <h2>{{$comment->name}}</h2>
                                <p>{{$comment->content}}
                                </p>
                                <div class="critique_info_utilisateur">
                                    <h3>{{$comment->updated_at}}</h3>
                                    <h4>{{$comment->note}}</h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($comments as $comment)
                        <div class="critique_contenu">
                            <h2>{{$comment->name}}</h2>
                            <p>{{$comment->content}}
                            </p>
                            <div class="critique_info_utilisateur">
                                <h3>{{$comment->updated_at}}</h3>
                                <h4>{{$comment->note}}</h4>
                                @if(!$comment->validated)
                                    <a href="{{url("/activatedCom/$comment->id")}}"><h4>Valider</h4></a>
                                @endif
                                <a href="{{url("/destroyCom/$comment->id")}}"><h4>Supprimer</h4></a>
                            </div>
                        </div>
                    @endforeach
                        <div class="critique_info_utilisateur">
                            <h4>{{$moyenne}} % de commentaire non validé</h4>
                        </div>
                @endif

            </div>


        </div>


        <div class="ecrire">
            <h2 id="ecrire_titre">Ecrire une critique sur {{$serie->nom}}</h2>

            <div id="ecrire_flex">
                <div id="ecrire_flex_head">
                    @if(Auth::user()!=null)
                    <form action = "{{route("comments.store")}}" method="POST">
                        @csrf


                        <div>
                            <label for="note"><strong>Note </strong></label>
                            <input type="integer"  name="note" placeholder=""
                                   value="{{ old('note') }}">
                        </div>

                        <div id="contenu_input">
                            <label for="content"><strong>Contenu </strong></label>
                            <input type="text" name="description"
                                   value="{{ old('description') }}"
                                   placeholder="">
                        </div>


                        <div>
                            <input type="hidden"  name="validated" value="0">
                            @auth
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            @endauth
                            <input type="hidden" value="{{$serie->id}}" name="serie_id">
                            <div>
                                <button class="btn btn-success" type="submit">Valider</button>
                            </div>
                        </div>

                    </form>
                    @else
                        <h1>Inscrivez vous !</h1>
                    @endif

                </div>
            </div>
        </div>



        <div class="saison">
            <h1 id="liste_episode">Liste des episodes</h1>

            <div class="episode_slider">
                @for ($i = 0; $i < $nbSaison; $i++)
                    <div><a class='as' href="" id='s{{$i+1}}'>Saison {{$i+1}}</a></div>
                @endfor
            </div>
            <div id='episodesSaison'>

            @for($i=0;$i<count($allContent);$i++)
                    <div class="liste_episodes" id='ds{{$i}}'>
                        @foreach($allContent[$i] as $image)
                            <div>
                                <h1> S : {{$i}} EP : {{array_search($image, $allContent[$i])}}</h1>
                                <img src="{{url("$image")}}">
                            </div>
                        @endforeach
                    </div>
            @endfor
            </div>
            </div>

        <script>
            $(document).ready(function() {
                $('.as').each(function() {
                    $(this).click(function(e) {
                        e.preventDefault();
                        $('.liste_episodes').fadeOut();
                        $('#d'+$(this).attr('id')).fadeIn();
                    })
                })
            });
        </script>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif





</body>

</html>
