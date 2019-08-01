@extends('layout.app')
@section('contents')
    <div class="container">
        <div class="jumbotron">
            <h3> {{$post->title}}</h3>
        </div>
        <div class="well">
            {!! $post->body !!}
        </div>
           
 

    <a href="/articles/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    div.
    {!! Form::open(['action'=> ['Admin\ArticlesAdminController@update', $post->id], 'method' => 'POST','class'=>'pull-left', 'enctype' => 'multipart/form-data']) !!}
    {{form::hidden('_method','PUT')}}
    {{form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! form::close() !!}

     {!! Form::open(['action'=> ['Admin\ArticlesAdminController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
        {{form::hidden('_method','DELETE')}}
        {{form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!form::close()!!} 
</div>
@endsection