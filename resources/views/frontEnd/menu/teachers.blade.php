@extends('frontEnd.master')
@section('title')
    Teacher and Stuff Page
@endsection
@section('content')
    <div class="mid-section">
        <div class="left-side">

            <div class="content-section-top">
                <div class="heading">
                    <h1>Teachers</h1>
                    <div class="heading-content">
                        @foreach($designations as $designation)
                            <div class="content">
                                <div class="head">
                                    <h3>{{{$designation->designation_name}}}</h3>
                                </div>
                                <div class="multiple">
                                    @foreach($teachers as $teacher)
                                        @if($designation->id == $teacher->designation_id)
                                            <div class="info">
                                                <div class="picture">
                                                    <img src="{{asset($teacher->image)}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <h2>Name: {{$teacher->name}}</h2>
                                                    <h2>{{$teacher->department}}</h2>
                                                    <h2>{{$teacher->education}}</h2>
                                                    <h2>Blood Group: {{$teacher->blood}}</h2>
                                                    <h2>E-mail: {{$teacher->email}}</h2>
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="content-section-bottom">
                <div class="heading">
                    <h1>Stuffs</h1>
                    <div class="heading-content">
                        @foreach($stuffs as $stuff)
                                <div class="info">
                                    <div class="picture">
                                        <img src="{{asset($stuff->image)}}" alt="">
                                    </div>$
                                    <div class="text">
                                        <h2>Name: {{$stuff->name}}</h2>
                                        <h2>Post: {{$stuff->post}}</h2>
                                        <h2>Blood Group: {{$stuff->blood}}</h2>
                                    </div>

                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <div class="right-side">
            <div class="content-section">
                <div class="heading">
                    <h1>Notice</h1>
                    <div class="main-content">
                        @foreach($notices as $notice)
                            <div class="info">
                                <div class="text">
                                    <a href="{{route('notice', ['id' => $notice->id])}}">{{$notice->id}}. {{$notice->notice_heading}}</a>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
