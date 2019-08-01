@extends('Front.admin')
@section('contents')



        <h3 class="text-capitalize text-cent"> the tag section of the articles</h3>

{!! Form::open(['action'=> 'Admin\TagsController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

       


        

    <div class="form-group">
        {{form::label('title','Tags')}}
        {{form::text('tag','',['class' => 'form-control', 'placeholder' => 'Tags'])}}
    </div>

   
    

       

    <div class="form-group">
            {{form::submit('Submit',['class' => 'btn btn-primary'])}}
            
        </div>
{!! Form::close() !!}
        

 
@endsection