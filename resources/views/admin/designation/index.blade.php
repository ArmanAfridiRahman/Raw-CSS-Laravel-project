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

            <button class="new-settings-menu">Add a new Designation +</button>

            <div class="settings-menu-form">
                <form action="{{route('designation.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Designation Name" name="designation_name">
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
                        <th>designation Name</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($designations as $designation)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$designation->designation_name}}</td>
                            <td>{{$designation->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('designation.edit', ['id'=>$designation->id])}}">Edit</a>
                                <a href="{{route('designation.status', ['id'=>$designation->id])}}">Update Status</a>
                                <a href="{{route('designation.delete', ['id' => $designation->id])}}" onclick="return confirm('Delete this designation?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
