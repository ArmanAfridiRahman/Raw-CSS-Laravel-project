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

            <button class="new-settings-menu">Add a new stuff +</button>

            <div class="settings-menu-form">
                <form action="{{route('stuff.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="stuff's Name" name="name">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Post Name" name="post">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Blood Group" name="blood">
                    </div>

                    <div class="picture">
                        <input type="file" class="form-control" name="image">
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
                        <th>stuff's Name</th>
                        <th>Image</th>
                        <th>Post Name</th>
                        <th>Blood Group</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($stuffs as $stuff)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$stuff->name}}</td>
                                    <td><img src="{{asset($stuff->image)}}" alt=""></td>
                                    <td>{{$stuff->post}}</td>
                                    <td>{{$stuff->blood}}</td>
                                    <td>{{$stuff->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('stuff.edit', ['id'=>$stuff->id])}}">Edit</a>
                                        <a href="{{route('stuff.status', ['id'=>$stuff->id])}}">Update Status</a>
                                        <a href="{{route('stuff.delete', ['id' => $stuff->id])}}" onclick="return confirm('Delete this stuff?')">Delete</a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
