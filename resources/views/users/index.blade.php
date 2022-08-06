@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h1>Users list</h1>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Index
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$Index + 1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->roles as $index=>$role )
                            {{$role->display_name}} {{$index+1 < $user->roles->count()?',':''}}
                        @endforeach
                    </td>
                    <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
            @endforeach
            </table>    
        




            </tbody>
        </div>
    </div>
</div>
@endsection
