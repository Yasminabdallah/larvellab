<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(){
       $post=Post::with('user')->paginate(3);
       return PostResource::collection($post);

    }
    public function store (StorePostRequest $request){
      $post=Post::create($request->all());
      return new  PostResource($post);


    }
}
