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

            <button class="new-settings-menu">Click to modify</button>

            <div class="settings-menu-form">
                <form action="{{route('settings.academic.update', ['id' => $academic->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="description">
                        <textarea class="academic" name="academic_information" id="" placeholder="Add description">{{$academic->academic_information}}</textarea>
                    </div>
                    <div class="picture">
                        <input type="file" class="form-control" name="academic_other_image[]" multiple>
                        <div class="images">
                            @foreach($academic->academicOtherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="create" type="submit">Update</button>
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
                        <th>Description</th>
                        <th>Other Images</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($academics as $academic)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$academic->academic_information}}</td>
                            <td>
                                <div class="images">
                                    @foreach($academic->academicOtherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="">
                                    @endforeach
                                </div>
                            </td>
                            <td>{{$academic->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('settings.academic.edit', ['id'=>$academic->id])}}">Edit</a>
                                <a href="{{route('settings.academic.status', ['id'=>$academic->id])}}">Update Status</a>
                                <a href="{{route('settings.academic.delete', ['id' => $academic->id])}}" onclick="return confirm('Delete this academic?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
