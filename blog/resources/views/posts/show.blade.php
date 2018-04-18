@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Detail </div>
                   <div class="card-body">
                    

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Title :</label>
                            <div class="col-md-6">
                            <h7>{{$post->title}} </h7>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description :</label>

                            <div class="col-md-6">
                            {{$post->description}} 
                           
                            </div>
                        </div>
     
                   
                    </div>
                </div>
                <br>
                <br>
                <div class="card-header">Post Creator </div>
                <div class="card-body">
                    

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Name :</label>
                            <div class="col-md-6">
                            <h7>{{$post->user->name}} </h7>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Email :</label>

                            <div class="col-md-6">
                            {{$post->user->email}} 
                           
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Created AT :</label>

                            <div class="col-md-6">
                            {{$post->created_at}}
                           
                            </div>
                        </div>
     
                   
             </div>


            </div>
        </div>
    </div>
</div>




@endsection