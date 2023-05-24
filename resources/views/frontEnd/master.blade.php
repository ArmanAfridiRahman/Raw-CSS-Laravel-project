<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/include.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/main.css" type="text/css">
    <title>@yield('title')</title>
</head>
<body>
<div class="background-picture">
    @include('frontEnd.include.common')
    <div class="main-content">
        <main>
            <div class="top-section">
                @foreach($homes as $home)
                    <div class="content-section">
                        <h1>{{$home->home_headline_one}}</h1>
                        <p>{{$home->home_description_one}}</p>
                    </div>
            </div>
            @endforeach
            <div class="tabs">
                <div class="single-tab">
                    <ul>
                        <li>

                            <ul>
                                <div class="single">
                                        <li>
                                            <div class="options">
                                                <h1>Admission</h1>
                                                <a href="{{route('admission')}}"><p>Learn about our admissions process</p></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="options">
                                                <h1>Curriculum</h1>
                                                <a href=""><p>Learn about our BTEB curriculum</p></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="options">
                                                <h1>Notice Board</h1>
                                                <a href="#"><p>We share our every academic notice in this website</p></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="options">
                                                <h1>Results</h1>
                                                <a href=""><p>Last Semester Results</p></a>
                                            </div>
                                        </li>
                                </div>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</div>
@include('frontEnd.include.footer')
<script src="{{asset("frontendAsset/js/scripts.js")}}"></script>
</body>
</html>
