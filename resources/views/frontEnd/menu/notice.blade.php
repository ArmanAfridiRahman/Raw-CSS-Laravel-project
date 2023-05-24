@extends('frontEnd.master')
@section('title')
    Academic
@endsection
@section('content')

    <div class="mid-section">
        <div class="notice">
            <div class="content-section">
                <div class="heading">
                    <h1>Notice</h1>
                    <div class="main-content">

                        @foreach($notices as $notice)
                            <div class="info">
                                <div class="text">
                                    <h1>{{$notice->id}}. {{$notice->notice_heading}}</h1>
                                </div>
                                <div class="pictures">
                                    @foreach($notice->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="">
                                    @endforeach
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
