<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Login JECO S.A.S</title>

        <!-- Required meta tags -->
        @laravelPWA
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('style.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    </head>
<body>

<div class="container-fluid rounded-lg border ">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/furni.jpg') }}" style="object-fit:" class="image-fluid rounded-lg w-100 h-100   " alt="Imagen de ejemplo">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            <h2 class="mb-4">Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control-lg rounded-pill @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">
                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control-lg rounded-pill @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Contraseña">
                    @error('password')
                        <div class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <button type="submit" class="sign-in">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
</div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
