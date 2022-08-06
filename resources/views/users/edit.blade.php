@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h1>Edit User {{$user->name}} </h1>
            <form action="{{route('users.update',$user->id)}}" method="post">
                {{csrf_feild()}}
                {{method_feild('PUT')}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" disabled class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <button type="submit"  class="btn btn-success" >Update</button>
                </div>
                <div class="form-group">
                    <label>Roles</label>
                    <div  class="checkbox" >
                        <label>
                            <input type="checkbox" name="roles[]" value="admin" {{$user->hasRole('admin')?'checked': ''}}>admin
                        </label>
                    </div>
                    <div  class="checkbox" >
                        <label>
                            <input type="checkbox" name="roles[]" value="user" {{$user->hasRole('user')?'checked': ''}}>user
                        </label>
                    </div>
                </div>
            </form>
            



            </tbody>
        </div>
    </div>
</div>
@endsection
