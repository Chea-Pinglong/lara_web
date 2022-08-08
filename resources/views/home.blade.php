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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css')}}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Poppins:wght@400;500&display=swap')}} " rel="stylesheet">
</head>
<div class="d-flex justify-content-end">
    <li >
    <a>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div >
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
</div>

<div class="container row justify-content-center">
    <div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="product">Go to product</a>
                </div>
            </div>
        </div>
    </div>
</div>
