@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/post-details.css')}}">
<div class="container">

    <div class = "row post-container">

        <!--img start-->
        <div class = "col img-container">
            <img class = "post-img" src = "/storage/{{$post->image}}">
        </div>
        <!--img end-->


        <!--info start-->
        <div class = "col info-container">
            <div class = "user-info-container d-flex justify-content-between">
                 <div class = "posted-by text-align-bottom">Posted by : <a href = "/profile/{{$post->user->id}}">{{$post->user->username}}</a></div> 

                <a href = ""><button class = "btn btn-primary" style="margin: .2rem"> Follow </button></a>
            </div>

            <p class = "m-2">{{$post->caption}}</p>

        </div>
        <!--info end-->


    </div>

    


    


    </div>
</div>
@endsection
