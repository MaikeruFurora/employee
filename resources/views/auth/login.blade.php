<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="icon" type="image/png" href="./assets/img/laravel.png">
        <!-- Styles -->
        <style type="text/css">
            .authentication{display:flex;align-items:center;height:100vh}
        </style>
        <link href="{{ asset('/assets/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="authentication">
            <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12"><br><br><br>
                  <div class="card mt-5">
                    <div class="card-header text-center card-header-success">MANAGEMENT SYSTEM</div>
                    <div class="card-body">
                     <form autocomplete="off" class="p-2" method="POST" action="{{ route('login') }}">
                        @csrf
                          <div class="form-group">
                            <label >Username</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group mt-5">
                            <label for="exampleInputPassword1">Password</label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                         {{--  <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                          </div> --}}
                          <button type="submit" class="btn btn-primary btn-block mt-5">Log In</button>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <img src="{{asset('assets/img/signup.svg')}}" alt="Locked"/>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
