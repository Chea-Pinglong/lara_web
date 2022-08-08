<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel ="  shortcut icon"  type = "image/png"
    href="{{asset('images/logo_title.png')}} " >
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('css/admin_page.css')}}">
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}} ">
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin>
    <!-- CSS only -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Poppins:wght@400;500&display=swap')}} " rel="stylesheet">
</head>

<body>

    <div class="form-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h3>login now</h3>
            {{-- <input type="email" name = "email" require placeholder="enter your email"> --}}
            <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus require placeholder="Enter your Email">

            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            {{-- <input type="password" name = "password" require placeholder="enter your password"> --}}
            <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" require placeholder="Enter your password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input type="submit" name = ""submit value="login now" class = "form-btn">
            <p>Don't have an account?<a href="{{ route('register') }}"> Register now</a> </p>
            
            
        </form>
    </div>
</body>
