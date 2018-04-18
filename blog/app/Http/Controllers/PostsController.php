<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\User;

class PostsController extends Controller

{
    
    public function index(){
        //3alshan mafrod wazeft pagination ani a2ll bdl ma b3ml select l 100 post la2 msln f awl 3 post l kol page w hakaza 
        $posts=Post::paginate(3);
       // dd($posts,$postsno);

        return view('posts.index',[
         'posts'=> $posts,
      
        ]);
    }
    public function create()
    {
        
        
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }
    public function store(StorePostRequest $request)
    {
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);
        return redirect('posts');
       
    }
    public function show(Request $request,$id)
    {
      
        $post = Post::where('id', '=', $id)->get()->first();
       
         dd($this->counter);
        return view('posts.show',[
            
            'post' => $post,
          
            
        ]);
       
    }
    public function destroy(Request $request,$id)
    {
        Post::find($id)->delete();
        
        
        return redirect(route('posts.index'));
       
    }
    public function edit(Request $request,$id)
    {
        $post=Post::find($id);
        $users = User::all();
        
        return view('posts.edit',[
            
            'post' => $post,
            'users' => $users
        ]);
       
    }
    public function update(UpdatePostRequest $request , Post $post){
       
        
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=> $request->user_id
        ]);
        return redirect(route('posts.index'));

    }







}
