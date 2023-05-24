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

            <button class="new-settings-menu">Add a new technology +</button>

            <div class="settings-menu-form">
                <form action="{{route('technology.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Technology Name" name="technology_name">
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
                        <th>Technology Name</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($technologies as $technology)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$technology->technology_name}}</td>
                            <td>{{$technology->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('technology.edit', ['id'=>$technology->id])}}">Edit</a>
                                <a href="{{route('technology.status', ['id'=>$technology->id])}}">Update Status</a>
                                <a href="{{route('technology.delete', ['id' => $technology->id])}}" onclick="return confirm('Delete this technology?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
