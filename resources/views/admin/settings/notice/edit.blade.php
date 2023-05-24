@extends('admin.master')
@section('title')
    settings-menu
@endsection
@section('content')
    <div class="settings-menu">
        <div class="toggle">
            <button class="toggle-navigation">Toggle</button>
        </div>
        <div class="add-settings-menu-form">

            <div class="settings-menu-form-edit">
                <form action="{{route('settings.notice.update', ['id' => $notice->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Heading" value="{{$notice->notice_heading}}" name="notice_heading">
                    </div>
                    <div class="picture">
                        <input type="file" class="form-control" name="image">
                        <img src="{{asset($notice->image)}}" alt="">
                        <input type="file" class="form-control" name="other_image[]" multiple>
                        <div class="images">
                            @foreach($notice->otherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="create" type="submit">update</button>
                    </div>
                </form>
                <br>
                <div class="message">{{session('message')}}</div>
            </div>
        </div>

        <div class="all-settings-menu">
            <div class="settings-menu-table">
                <table>
                    <thead>
                    <tr>
                        <th>sl no</th>
                        <th>Heading</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($notices as $notice)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$notice->notice_heading}}</td>
                            <td><img src="{{asset($notice->image)}}" alt=""></td>
                            <td>{{$notice->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('settings.notice.edit', ['id'=>$notice->id])}}">Edit</a>
                                <a href="{{route('settings.notice.status', ['id'=>$notice->id])}}">Update Status</a>
                                <a href="{{route('settings.notice.delete', ['id' => $notice->id])}}" onclick="return confirm('Delete this notice?')">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
