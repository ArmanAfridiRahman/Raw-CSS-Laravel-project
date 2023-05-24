@extends('frontEnd.master')
@section('title')
    Home Page
@endsection
@section('content')

    <div class="mid-section">
        <div class="left-side">
            <div class="content-section-top">
                @foreach($homes as $home)
                <div class="heading">
                    <h1>{{$home->home_headline_two}}</h1>
                    <div class="heading-content">
                        <p>
                            {{$home->home_description_two}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>



        <div class="right-side">
            <div class="content-section">
                <div class="heading">
                    <h1>Notice</h1>
                    <div class="main-content">
                        @php
                            $i = 1
                        @endphp
                        @foreach($notices as $notice)
                            <div class="info">
                                <div class="text">
                                    <a href="{{route('notice', ['id' => $notice->id])}}">{{$notice->id}}. {{$notice->notice_heading}}</a>
                                    <br>
                                </div>
                            </div>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bottom-section">
        @foreach($homes as $home)
        <div class="heading">
            <h1>{{$home->home_programs}}</h1>
        </div>
        @endforeach
        <div class="main-content">
            <div class="left">
                <div class="title">
                    <h1>Kawran Bazar Campus</h1>
                </div>
                <div class="items">
                    <ul>
                        <li>Architecture Technology</li>
                        <li>Chemical Technology</li>
                        <li>Civil Technology</li>
                        <li>Computer Technology</li>
                        <li>Electrical Technology</li>
                        <li>Electronics Technology</li>
                        <li>Textile Technology</li>
                    </ul>
                </div>
            </div>
            <div class="left">
                <div class="title">
                    <h1>Ashulia Campus</h1>
                </div>
                <div class="items">
                    <ul>
                        <li>Civil Technology</li>
                        <li>Computer Technology</li>
                        <li>Electrical Technology</li>
                        <li>Textile Technology</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
