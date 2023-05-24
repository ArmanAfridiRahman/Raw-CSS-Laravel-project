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
                <form action="{{route('settings.home.update', ['id' => $home->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="heading">
                        <input type="text" class="form-control" value="{{$home->home_tabs}}" placeholder="Home Tab Name" name="home_tabs">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$home->home_tab_description}}" placeholder="Tab Description" name="home_tab_description">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$home->home_headline_one}}" placeholder="Headline" name="home_headline_one">
                    </div>
                    <div class="description">
                        <textarea class="academic" name="home_description_one" placeholder="Description">{{$home->home_description_one}}</textarea>
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$home->home_headline_two}}" placeholder="Headline" name="home_headline_two">
                    </div>
                    <div class="description">
                        <textarea class="academic" name="home_description_two" placeholder="Description">{{$home->home_description_two}}</textarea>
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" value="{{$home->home_programs}}" placeholder="Program Headline" name="home_programs">
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
                        <th>home_tabs</th>
                        <th>home_tab_description</th>
                        <th>home_headline_one</th>
                        <th>home_description_one</th>
                        <th>home_headline_two</th>
                        <th>home_description_two</th>
                        <th>home_programs</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homes as $home)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$home->home_tabs}}</td>
                            <td>{{$home->home_tab_description}}</td>
                            <td>{{$home->home_headline_one}}</td>
                            <td>{{$home->home_description_one}}</td>
                            <td>{{$home->home_headline_two}}</td>
                            <td>{{$home->home_description_two}}</td>
                            <td>{{$home->home_programs}}</td>
                            <td>{{$home->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('settings.home.edit', ['id'=>$home->id])}}">Edit</a>
                                <a href="{{route('settings.home.status', ['id'=>$home->id])}}">Update Status</a>
                                <a href="{{route('settings.home.delete', ['id' => $home->id])}}" onclick="return confirm('Delete this home?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
