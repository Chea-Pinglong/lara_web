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
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h3>register now</h3>
        {{-- <input type="text" name = "name" require placeholder="Enter your name"> --}}
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus require placeholder="Enter your name">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <input type="email" name = "email" require placeholder="Enter your email"> --}}

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required placeholder="Enter your email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <input type="password" name = "password" require placeholder="Enter your password"> --}}

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        {{-- <input type="password" name = "cpassword" require placeholder="Confirm your password"> --}}

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" required placeholder="Confirm password">
        </div>

        {{-- <input type="submit" name = ""submit value="register now" class = "form-btn">  --}}

        <input type="submit" name="" submit value="Submit" class="form-btn">
        <p>Already have an account? <a href="{{ route('login') }}">login</a></p>
    </form>
</div>

</body>


