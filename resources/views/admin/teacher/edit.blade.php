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
                <form action="{{route('teacher.update', ['id'=> $teacher->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Group" value="{{$teacher->designation}}" name="designation">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Teacher's Name" value="{{$teacher->name}}" name="name">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$teacher->department}}" placeholder="Use this row only for department in-charge" name="department">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$teacher->education}}" placeholder="Degree Name" name="education">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$teacher->blood}}" placeholder="Blood Group" name="blood">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$teacher->email}}" placeholder="E-mail" name="email">
                    </div>


                    <div class="picture">
                        <input type="file" class="form-control" name="image">
                        <img src="{{asset($teacher->image)}}" alt="">
                    </div>
                    <div class="action-buttons">
                        <button class="create" type="submit">Create</button>
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
                        <th>Group Name</th>
                        <th>Teacher's Name</th>
                        <th>In-Charge</th>
                        <th>Image</th>
                        <th>Degree Name</th>
                        <th>Blood Group</th>
                        <th>E-mail</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$teacher->designation}}</td>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->department}}</td>
                            <td><img src="{{asset($teacher->image)}}" alt=""></td>
                            <td>{{$teacher->education}}</td>
                            <td>{{$teacher->blood}}</td>
                            <td>{{$teacher->email}}</td>
                            <td>{{$teacher->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('teacher.edit', ['id'=>$teacher->id])}}">Edit</a>
                                <a href="{{route('teacher.status', ['id'=>$teacher->id])}}">Update Status</a>
                                <a href="{{route('teacher.delete', ['id' => $teacher->id])}}" onclick="return confirm('Delete this teacher?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
