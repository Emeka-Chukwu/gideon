@extends('Front.master')
@section('contents')
    
    @foreach ($categories as $category)
        
    @endforeach      
    @foreach ($articles as $article)
        
    @endforeach

        <h1>{{$event->theme}}</h1>
        <p>
            {{$event->description}}
        </p>
        <p>
            <img src="/storage/event_image/{{$event->image}}" alt="{{$event->image}}">
        </p>
        

        
        @if(!Auth::guest())

        @if(Auth::user()->id == $event->user_id)
        

            {{-- the modal form --}}

           
             





            <a href="/events/{{$event->id}}/edit" class="btn btn-default">Edit</a>

            {!! Form::open(['action'=> ['EventController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
                {{form::hidden('_method','DELETE')}}
                {{form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!form::close()!!}
        @endif
    @endif
@endsection