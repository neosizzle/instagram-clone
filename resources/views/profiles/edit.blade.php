@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/profile-edit.css')}}">
<div class="content-container row">
    <!--form start-->

    <div class="col form-container">
        <h1 class = "title display-3">
            Edit your profile
        </h1>

        <form action = {{"/profile/".$user->id}} method="POST">
            @csrf
            @method('PATCH') {{--since html can only send post and get, we use this to trick it into a patch method --}}

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name = "username" value = {{$user->username}}>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control" id="description" name = "description">
                    {{$user->profile->description}}
                </textarea>
              </div>


              <button type="submit" class="btn btn-primary">Submit</button>
            

        </form>

    </div>

    <!--form end-->

    <!--form illus start-->
    <div class = "col illus-container">
        <img class = "form-illus" src = "/svg/edit-profile.svg">
    </div>
    <!-- form illus end-->

  
</div>
@endsection
