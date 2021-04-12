<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Post;


class PostController extends Controller
{
    //constructor
    public function __construct()
    {
        //instanciate auth middleware
        $this->middleware('auth');
    }
    
    public function index(){
        //gets all the users that the current user is following
        $users = auth()->user()->following()->pluck('profiles.user_id');

        //gets all the post from those users
        $posts = Post::whereIn('user_id' , $users)->with('user')->latest()->paginate(5);

        return view('posts/index' , [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts/create');
    }

    public function store(){
        //request() object is like req obj in node THAT IS PASSED ON THROUGH FORMS
        //req.all is like req.body

        $data = request()->validate([
            //request validation
            'post-caption' => 'required',
            'post-image' => 'required'
        ]);

        //store image in local storage so its publicly accessible
        $imgPath = request('post-image')->store('uploads' , 'public');//first param is the file directory, 2nd is the key(different for aws, aliyun etc..)

        //resize stored image
        //$image = Image::make(public_path('storage/{$imgPath}'))->fit();

        //since userid is needed, create post entry THROUGH the refrence of the current signed in user
        auth()->user()->posts()->create([ //error here because intellisense being wack, its working.
            'caption' => $data['post-caption'],
            'image' => $imgPath
        ]);

        //redirect user
        return redirect('/profile/'.auth()->user()->id);
        

    }

    public function show(\App\Models\Post $post){ //shorthand syntax to fetch the obejct unlike manual fetch in profile controller (route model bindning)
        return view('posts/show' , [
            'post' => $post
        ]);
    }
}
