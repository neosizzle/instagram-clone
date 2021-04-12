@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/homepage.css')}}">
<div class="content-container container">


    <div class="row info d-flex justify-content-center">
        <div class="col-3">
        <img src = "/svg/avatar.svg" style = "height:10rem;width:100%">
        </div>

        <div class="col-9">
        <div class="info-container p-3">

        <div class="name d-flex m-1 justify-content-between">
        <div><h1 class = ""> {{$user -> username}} </h1></div>
        <div><follow-button user-id = "{{$user->id}}" follows = "{{$follows}}" auth-user-id = "{{auth()->user()->id}}"></follow-button></div>

        </div>

        <div class="desc p-3 d-flex justify-content-around">
        <p>
            {{$user->profile->description ?? 'Default desc'}}
        </p>
        </div>

        <div class="follwers d-flex justify-content-around">

        <div>
        <strong> Followers : </strong>{{$user->profile->followers->count()}}
        </div>

        
        <div>
        <strong>Following : </strong>{{$user->following->count()}}
        </div>

        <div>
        <strong>Posts : </strong> {{$user->posts->count()}}
        </div>
        </div>

        </div>
        </div>

    </div>

    <div class="row posts p-3 d-flex justify-content-right ">
        @foreach ($user->posts as $post)
            <div class="col-3"> <a href = "/post/{{$post->id}}"><img class = "post-img mt-5" src ="/storage/{{$post->image}}"></a> </div>
        @endforeach


    </div>

    <div class = "row add-post-container d-flex justify-content-center">
    <a href = "../post/create">Add new post</a>

    </div>
</div>
@endsection
