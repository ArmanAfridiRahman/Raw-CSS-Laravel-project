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

            <button class="new-settings-menu">Add a new curriculum +</button>

            <div class="settings-menu-form">
                <form action="{{route('settings.curriculum.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <select class="select-form-control" required name="technology_id" >
                        <option value="" disabled selected>-- Select Technology --</option>
                        @foreach($technologies as $technology)
                            <option value="{{$technology->id}}">{{$technology->technology_name}}</option>
                        @endforeach
                    </select>
                    <select  class="select-form-control"  required name="probidhan_id">
                        <option value="" disabled selected>-- Select Probidhan --</option>
                        @foreach($probidhans as $probidhan)
                            <option value="{{$probidhan->id}}">{{$probidhan->probidhan}}</option>
                        @endforeach
                    </select>

                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Semester" name="semester">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Link Address" name="links">
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
                        <th>Technology</th>
                        <th>Probidhan</th>
                        <th>Semester</th>
                        <th>Link Address</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($technologies as $technology)
                        @foreach($probidhans as $probidhan)
                            @foreach($curricula as $curriculum)
                                @if($technology->id == $curriculum->technology_id && $probidhan->id == $curriculum->probidhan_id)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$technology->technology_name}}</td>
                                        <td>{{$probidhan->probidhan}}</td>
                                        <td>{{$curriculum->semester}}</td>
                                        <td>{{$curriculum->links}}</td>
                                        <td>{{$curriculum->status == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>
                                            <a href="{{route('settings.curriculum.edit', ['id'=>$curriculum->id])}}">Edit</a>
                                            <a href="{{route('settings.curriculum.status', ['id'=>$curriculum->id])}}">Update Status</a>
                                            <a href="{{route('settings.curriculum.delete', ['id' => $curriculum->id])}}" onclick="return confirm('Delete this curriculum?')">Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
