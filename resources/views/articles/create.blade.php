@extends('Front.master')
@section('contents')
@foreach ($articles as $article)
    
@endforeach
 
{!! Form::open(['action'=> 'ArticlesController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
            {{form::label('category','Category')}}
            @if(count($categories) > 0)
        <select class="form-control" name="category">
            
                @foreach ($categories as $category)
        <option value="{!! $category->id !!}">  {!! $category->cat !!}</option>
                @endforeach
        </select>
{{-- 
        <select class="form-control" name="categories[]" multiple='multiple' size="{{$categories->count()}}">
            
            @foreach ($categories as $category)
    <option value="{!! $category->id !!}">  {!! $category->cat !!}</option>
            @endforeach
    </select> --}}


            @endif
    </div>
    <div class="form-group">
        {{form::label('title','Title')}}
        {{form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
    </div>

    <div class="form-group">
        {{form::label('slug','Slug')}}
        {{form::text('slug','',['class' => 'form-control', 'placeholder' => 'Enter title url'])}}
    </div>

    <div class="form-group">
        {{form::label('body','Body')}}
        {{form::textarea('body','',['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'body'])}}
    </div>

    <div class="form-group">
        {{form::file('cover_image')}}

    </div>
    {{-- <div class="form-group"> 
         {!! Form::label('Categories') !!} 
         {!! Form::select('categories', $categories, null, 
          array('multiple'=>'multiple','name'=>'categories[]')) !!} 
          
           </div> --}}

           {{Form::label('tags', 'TAGI:', ['class' => 'margin-top'])}}
           <select class="form-control select2-multi margin-bottom" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{$tag->name}}</option>
                @endforeach
        </select>

    <div class="form-group">
            {{form::submit('Submit',['class' => 'btn btn-primary'])}}
            
        </div>
{!! Form::close() !!}

    
@endsection
