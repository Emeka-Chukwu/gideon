@extends('Front.master')
@section('contents')
    
        {{-- <div class="row"> --}}
            {{-- <div class="col-xs-12 col-md-12"> --}}
                <h2 class="text-center"> The the contact Page </h2>
            {{-- </div> --}}
        {{-- </div> --}}
        @foreach ($articles as $article)
            
        @endforeach

	{{'you are welcome to contact for anything related to growth of the church and individual spiritual growth that.'}}


	{!! Form::open(['action'=> 'emailsController@SendMailNow', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

	<div class="form-group">
		{{form::label('name','Name')}}
		{{form::text('name', '',['class' => 'form-control', 'placeholder' => 'Name'])}}
	</div>

    <div class="form-group">
		{{form::label('email','Email')}}
		{{form::email('email', '',['class' => 'form-control', 'placeholder' => 'Email'])}}
	</div>
	
	
	<div class="form-group">
		{{form::label('subject','Subject')}}
		{{form::text('subject', '',['class' => 'form-control', 'placeholder' => 'Subject'])}}
	</div>
	
	<div class="form-group">
		{{form::label('message','Compose Email')}}
		{{form::textarea('message', '',['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Compose Email'])}}
	</div>
	
	<div class="form-group">
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