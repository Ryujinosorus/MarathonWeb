@extends('layouts.app')



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
    <div id="filtre">
        <div id="text">

            <header class="header">

                <a href="{{url("/")}}"><p>Watch it!</p></a>

            </header>


            <div class="bodyaccount">

                <section class="signup">
                    <div class="bodyaccount_container">
                        <div class="signup-content">
                            <form method="POST" id="signup-form" class="signup-form">
                                @csrf
                                <h2 class="form-title">Créer un compte</h2>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">


                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf

                                                        <div class="register-center">

                                                            <div class="form-group row">
                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>



                                                                <div class="col-md-6">
                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                    @enderror
                                                                </div>
                                                            </div>





                                                            <div class="form-group row">
                                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Register') }}
                                                                    </button>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
</body>
</html>

