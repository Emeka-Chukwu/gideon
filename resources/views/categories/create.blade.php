@extends('Front.admin')
@section('contents')
    <h2 class="text-center text-success"> Create a new Category</h2>

    
{!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
      

<div class="form-group">
    {{form::label('category','New Category',['class'=>'text-uppercase'])}}
    {{form::text('category','',['class' => 'form-control', 'placeholder' => 'Categories'])}}
</div>

<div class="form-group">
        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
        
    </div>
{!! Form::close() !!}
@endsection