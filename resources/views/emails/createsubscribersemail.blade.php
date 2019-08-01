
@extends('Front.master')
@section('contents')
<div class="well">
{!! Form::open(['action' => 'emailsController@SubscribersMessage', 'method'=>'post', 'enctype'=> 'multipart/form-data'])!!}

<div class="form-group">
    {{form::label('subject','Subject',['class'=> 'control-label'])}}
    {{form::text('subject', '',['class' => 'form-control', 'placeholder' => 'Subject'])}}
</div>

<div class="form-group">
    {{form::label('title','Title')}}
    {{form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>

<div class="form-group">
    {{form::label('message','Message')}}
    {{form::textarea('message', '',[ 'id'=> 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Message'])}}
</div>

<div class="form-group">
 
    {{form::submit('Send',['class' => 'btn btn-primary'])}}
</div>


{!! Form::close()!!}

@foreach ($categories as $category)
    
@endforeach

@foreach ($articles as $article)
    
@endforeach
</div>

@endsection