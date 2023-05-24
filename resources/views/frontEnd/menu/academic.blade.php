@extends('frontEnd.master')
@section('title')
    Academic
@endsection
@section('content')

    <div class="mid-section">
        <div class="left-side">
            <div class="content-section-top">
                @foreach($academics as $academic)
                    <div class="heading">
                        <h1>Academic</h1>
                        <div class="heading-content">
                            <p>
                                {{$academic->academic_information}}
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
        @foreach($academics as $academic)

            <div class="main-content">

                <div class="image-container">
                    @foreach($academic->academicOtherImages as $otherImage)
                        <img src="{{$otherImage->image}}" alt="">
                    @endforeach
                </div>

            </div>

        @endforeach
    </div>

@endsection
