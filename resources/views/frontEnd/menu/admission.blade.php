@extends('frontEnd.master')
@section('title')
    Admission
@endsection
@section('content')
    <div class="mid-section">

        <div class="left-side">
            <div class="content-section-top">
                    <div class="heading">
                        <h1>Academic</h1>
                        @foreach($admissions as $admission)
                        <div class="heading-content">
                            <a href="{{$admission->links}}">{{$admission->links_name}}</a>
                            <img src="{{$admission->image}}" alt="">
                        </div>
                        @endforeach
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

    <div class="bottom-section">
        @foreach($admissions as $admission)
            <div class="main-content">
                <div class="image-container">
                    @foreach($admission->admissionOtherImages as $otherImage)
                        <img src="{{$otherImage->image}}" alt="">
                    @endforeach
                </div>

            </div>

        @endforeach
    </div>



@endsection
