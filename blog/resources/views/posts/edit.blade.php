@extends('layouts.master')

@section('content')



<div class="card-body">
                    <form method="POST" action="/posts/{{$post->id}}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text"  name="title" value= {{$post->title}} >
                                @if ($errors->has('title'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                            <textarea id="description" name="description"  >{{$post->description}} </textarea>
                            @if ($errors->has('description'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="posst creator" class="col-md-4 col-form-label text-md-right">Post Creator</label>

                            <div class="col-md-6">
                            <select class="form-control" name="user_id">
                            @foreach ($users as $user){}
                                @if($user->name==$post->user->name){
                                      <option value="{{$user->id}}" selected>{{$post->user->name}}</option>
                                    }
                                @else{
                                      <option value="{{$user->id}}" >{{$user->name}}</option>
                                    }
                                @endif



                                }
    
                              @endforeach

                            </select>

                               
                            </div>
                        </div>
                    

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                               
                            </div>
                        </div>

     
                    </form>
                </div>






@endsection