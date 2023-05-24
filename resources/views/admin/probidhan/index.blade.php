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

            <button class="new-settings-menu">Add a new probidhan +</button>

            <div class="settings-menu-form">
                <form action="{{route('probidhan.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Probidhan Year" name="probidhan">
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
                        <th>Probidhan</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($technologies as $probidhan)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$probidhan->probidhan}}</td>
                            <td>{{$probidhan->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('probidhan.edit', ['id'=>$probidhan->id])}}">Edit</a>
                                <a href="{{route('probidhan.status', ['id'=>$probidhan->id])}}">Update Status</a>
                                <a href="{{route('probidhan.delete', ['id' => $probidhan->id])}}" onclick="return confirm('Delete this probidhan?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
