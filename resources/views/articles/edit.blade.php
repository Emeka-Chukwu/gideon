@extends('Front.master')
@section('contents')
@foreach ($articles as $article)
    
@endforeach
{!! Form::open(['action'=> ['ArticlesController@update', $articleEdit->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
            {{form::label('category','Category')}}
            @if(count($categories) > 0)
        <select class="form-control" name="category">
            
               
        <option value="{!! $articleEdit->categories->id !!}">  {!! $articleEdit->categories->cat !!}</option>
                
               
        </select>
            @endif
    </div>
    <div class="form-group">
        {{form::label('title','Title')}}
        {{form::text('title', $articleEdit->title,['class' => 'form-control', 'placeholder' => 'title'])}}
    </div>

    <div class="form-group">
        {{form::label('body','Body')}}
        {{form::textarea('body',$articleEdit->body,['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'body'])}}
    </div>

    <div class="form-group">
        {{form::file('cover_image')}}

    </div>

    <div class="form-group">
        {{form::hidden('_method','PUT')}}
            {{form::submit('Submit',['class' => 'btn btn-primary'])}}
            
        </div>
{!! Form::close() !!}

    
@endsection
