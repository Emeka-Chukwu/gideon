@extends('Front.master')
<style>
    .display-comment .display-comment {
        margin-left: 65px
    }
</style>

@section('contents')
    @foreach ($articles as $article)
        
    @endforeach

    <div class="" style="background-color:white; padding:5%">
        

        <div class=" tex-center">
            <h1 class="text-center"> {{$articleShow->title}}</h1>
            <hr>
            <div class="text-center">
            <img src="/storage/cover_image/{{$articleShow->image}}" style="max-width:100%">
            </div>
            <hr>
                <div class="text-justify"> {!!$articleShow->body!!}</div>
                <hr>
            <small>written on {{$articleShow->created_at}} by {{$articleShow->user->name}}</small>
            <div><small>{{$articleShow->categories->cat}}</small></div>
            <hr>
           
            <h4 class="text-capitalize"> Tags</h4>
            <div>
            @foreach ($articleShow->tags as $tag)
                <span class="btn btn-default">{{$tag->name.',  '}}</span>
                <br>
            @endforeach
            </div>
     
            

                  @if(!Auth::guest())

        @if(Auth::user()->id == $articleShow->user_id)
        

            {{-- the modal form --}}

           
             





            <a href="/articles/{{$articleShow->id}}/edit" class="btn btn-default">Edit</a>

            {!! Form::open(['action'=> ['ArticlesController@destroy', $articleShow->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
                {{form::hidden('_method','DELETE')}}
                {{form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!form::close()!!}
        @endif
    @endif



    <hr />

    <h4>Display Comments</h4>
    @include('partials._comment_replies', ['comments' => $articleShow->comments, 'article_id' => $articleShow->id])
  <br>
    <hr />   

    <div class="jumbotrn">    
        {!! Form::open(['action'=> 'CommentsController@store', 'method' => 'Post']) !!}
        <div class="form-group">
            {{form::textarea('comment_body','', ['class'=>'form-control','placeholder' => 'comment'])}}
            {{form::hidden('article_id',$articleShow->id, ['class'=>'text-center','placeholder' => 'comment'])}}
        </div>
        {{-- action="{{ route('post.store') }}"> --}}
        
        <div class="form-group">
                {{form::submit('Comments',['class' => 'btn btn-primary'])}}
                
            </div>
        {!! Form::close() !!}
        
            </div>
           
            
        
    
       </div>
    </div>
    
@endsection