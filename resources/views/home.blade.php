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

        <div class="name d-flex m-1">
        <h1 class = "m-auto"> {{$user -> username}} </h1>
        <button class = "btn btn-primary m-auto"> Follow </button>

        </div>

        <div class="desc p-3 d-flex justify-content-around">
        <p>
            {{$user->profile->description}}
        </p>
        </div>

        <div class="follwers d-flex justify-content-around">

        <div>
        <strong> Followers : </strong>222
        </div>

        
        <div>
        <strong>Following : </strong>222
        </div>

        <div>
        <strong>Posts : </strong> 222
        </div>
        </div>

        </div>
        </div>

    </div>

    <div class="row posts p-3 d-flex justify-content-center">
    <div class="col-3"><img class = "post-img" src ="/svg/sample-post-1.svg"> </div>
    <div class="col-3"><img class = "post-img" src ="/svg/sample-post-2.svg"> </div>
    <div class="col-3"><img class = "post-img" src ="/svg/sample-post-3.svg"> </div>

    </div>

    <div class = "row add-post-container d-flex justify-content-center">
    <a href = "">Add new post</a>

    </div>
</div>
@endsection
