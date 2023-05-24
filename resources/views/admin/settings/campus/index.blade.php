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

            <button class="new-settings-menu">Add a new campus +</button>

            <div class="settings-menu-form">
                <form action="{{route('settings.campus.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="campus Name" name="campus_name" required>
                    </div>
                    <div class="description">
                        <textarea class="academic" name="campus_address" placeholder="Add Campus Address" required></textarea>
                    </div>
                    <select class="select-form-control" name="technology_id">
                        <option value="" disabled selected>-- Select Technology --</option>
                        @foreach($technologies as $technology)
                            <option value="{{$technology->id}}">{{$technology->technology_name}}</option>
                        @endforeach
                    </select>
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
                        <th>campus Name</th>
                        <th>Technology Name</th>
                        <th>Campus Address</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($technologies as $technology)
                        @foreach($campuses as $campus)
                            @if($technology->id == $campus->technology_id || $campus->technology_id == '')
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$campus->campus_name}}</td>
                                    @if($campus->technology_id == null)
                                        <td>No Technology Added</td>
                                        @else
                                        <td>{{$technology->technology_name}}</td>
                                    @endif
                                    <td>{{$campus->campus_address}}</td>
                                    <td>{{$campus->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('settings.campus.edit', ['id'=>$campus->id])}}">Edit</a>
                                        <a href="{{route('settings.campus.status', ['id'=>$campus->id])}}">Update Status</a>
                                        <a href="{{route('settings.campus.delete', ['id' => $campus->id])}}" onclick="return confirm('Delete this campus?')">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
