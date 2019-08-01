@extends('Front.master')
@section('contents')
        <h2 class="text-center"> The Events Page </h2>
        @foreach ($articles as $article)
            
        @endforeach
        @if (count($events) > 0)
                @foreach ($events as $event)
                {{-- <div class="row"> --}}
                                <div class="row" style="background-color: white; margin:20px auto">
                        <div class="col-md-5">
                                <img src="/storage/event_image/{{$event->image}}" alt="{{$event->image}}" style="min-width: 100%">
                        </div>
              
                        <div class="col-md-7"> 
                                 <h3 class=" text-center text-danger"> {{$event->theme}} </h3>
                                <h4 class="text-center text-danger"> {{$event->time}} </h4>
                                {{-- {{$article->created_at->format('l jS \\of F Y\\, h:i:s A')}} --}}
                                <h5 class="text-center text-danger"> {{$event->venue}} </h5>
                {{-- <hr> --}}
                        </div>
                        <br/><br>
        </div>
                @endforeach
            
        @endif
    
@endsection