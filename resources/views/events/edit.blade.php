@extends('Front.master')
@section('contents')
    
        {{-- <div class="row"> --}}
            {{-- <div class="col-xs-12 col-md-12"> --}}
                <h2 class="text-center"> Your Church program Event </h2>
            {{-- </div> --}}
        {{-- </div> --}}
        @foreach ($articles as $article)
            
        @endforeach

	{{-- {{'you are welcome to contact for anything related to growth of the church and individual spiritual growth that.'}} --}}


	{!! Form::open(['action'=> ['EventController@update',$event->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

	<div class="form-group">
		{{form::label('theme','Theme')}}
		{{form::text('theme', $event->theme,['class' => 'form-control', 'placeholder' => 'Theme'])}}
	</div>

    <div class="form-group">
		{{form::label('time','Time')}}
		{{form::text('time', $event->time,['class' => 'form-control', 'placeholder' => 'Time'])}}
	</div>
    
    <div class="form-group">
		{{form::label('venue','Venue')}}
		{{form::text('venue', $event->venue,['class' => 'form-control', 'placeholder' => 'Venue'])}}
    </div>
	
	<div class="form-group">
		{{form::label('description','Description')}}
		{{form::textarea('description', $event->description,['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
	</div>
	
	
    <div class="form-group">
		{{form::label('image','Image')}}
		{{form::file('image', '',['class' => 'form-control'])}}
	</div>
	
	<div class="form-group">
            {{form::hidden('_method','PUT')}}
		{{form::submit('Submit',['class' => 'btn btn-primary'])}}
		
    </div>
		
		 
		 {!! form::close()!!}
{{-- 

<style>
.horizontalLine hr{
border-bottom: 3px solid lightgray;
}
</style>
<div class="horizontalLine">
<hr>
</div> --}}        
@endsection