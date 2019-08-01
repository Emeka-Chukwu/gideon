@extends('Front.master')
@section('contents')
  
                    
                       <h2 class="text-center"> The Article page </h2>
                  
                   @if(count($articles) > 0)
                       @foreach ($articles as $article)
                           <div class="well text-center">
                               <h1> {{$article->title}}</h1>
                               <div> {{$article->body}}</div>
                               <hr>
                           <small>written on {{$article->created_at}} by {{$article->user->name}}</small>
                           <div><small>{{$article->categories->cat}}</small></div>
                           </div>
                           
                       @endforeach 
                      <div class="text-center"> {{$articles->links()}}
                      </div>
                   @endif

                      <example></example>
               
    
@endsection