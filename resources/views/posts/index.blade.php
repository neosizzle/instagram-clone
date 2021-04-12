@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/post-index.css')}}">
<div class="d-flex justify-content-center">
    
    <!-- posts start-->
    <div class = 'posts-container'>

        @foreach ($posts as $post)

        <div class = "post-container">
            <div class = "row">
                <div class = "col title-container d-inline text-align-middle">
                    <span class = "title">{{$post->user->username}}</span>
                </div>
            </div>

            <div class = "row">
                <div class = "col img-container  d-flex justify-content-center">
                    <a href = "/post/{{$post->id}}"><img class = "post-img mt-5" src ="/storage/{{$post->image}}"></a>
                </div>
            </div>

        </div>
        
        

        @endforeach
        <div class="row">
            <div class="col-12">
                {{$posts->links("pagination::bootstrap-4")}}
            </div>
        </div>


    </div>
    <!-- posts end-->

</div>
@endsection
