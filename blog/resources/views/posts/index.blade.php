@extends('layouts.master')


@section('content')



<div class="container">
<a href='/posts/create'><button  type="button" class="btn btn-success">New Post</button></a>
<table class="table table-striped">
<thead>
<tr>
    <th>PostNo</th>
    <th>Title</th>
    <th>PostedBy</th>
    <th>CreatedAt</th>
    <th>slug</th>
    <th>Action</th>
 </tr>   
</thead>

@foreach ($posts as $post)
<tbody>
<tr>
<td>{{$post->id}}</td>
<td>{{$post->title}}</td>
<<td>{{$post->user->name}}</td>
<td>{{ $post->created_at->format('d-m-Y') }}</td>
<td>{{$post->slug}}</td>
<td>

<a href='/posts/{{$post->id}}'><button class="btn btn-default">View</button></a>
<a href='/posts/{{$post->id}}/edit'><button class="btn btn-primary">Update</button></a>
<form method='post' action='/posts/{{$post->id}}'>
{{csrf_field()}}
{{method_field('DELETE')}}
<button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure You Would Like to Delete This Post?');">Delete</button>

</form>                   
</td>
</tr>
</tbody>

@endforeach

</table>
</div>

{{$posts->links()}}


@endsection