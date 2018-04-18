@extends('layouts.master')

@section('content')



<div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text"  name="title" >
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
                            <textarea id="description" name="description"  > </textarea>
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
                                @foreach ($users as $user)
                                   <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                        </select>

                               
                            </div>
                        </div>
                    

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                               
                            </div>
                        </div>

     
                    </form>
                </div>


@endsection
