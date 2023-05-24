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

            <button class="new-settings-menu">Add a new admission +</button>

            <div class="settings-menu-form">
                <form action="{{route('settings.admission.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Link Name" name="links_name">
                    </div>
                    <div class="heading">
                        <input type="text" class="form-control" placeholder="Link Address" name="links">
                    </div>
                    <div class="picture">
                        <input type="file" class="form-control" name="image">
                        <input type="file" class="form-control" name="admission_other_image[]" multiple>
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
                        <th>Link Address</th>
                        <th>Link Name</th>
                        <th>Image</th>
                        <th>Other Images</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($admissions as $admission)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$admission->links}}</td>
                            <td>{{$admission->links_name}}</td>
                            <td><img src="{{asset($admission->image)}}" alt=""></td>
                            <td>
                                <div class="images">
                                    @foreach($admission->admissionOtherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="">
                                    @endforeach
                                </div>
                            </td>
                            <td>{{$admission->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{route('settings.admission.edit', ['id'=>$admission->id])}}">Edit</a>
                                <a href="{{route('settings.admission.status', ['id'=>$admission->id])}}">Update Status</a>
                                <a href="{{route('settings.admission.delete', ['id' => $admission->id])}}" onclick="return confirm('Delete this admission?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
