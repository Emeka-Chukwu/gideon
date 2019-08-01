@extends('Front.master')
@section('contents')
@foreach ($articles as $article)
    
@endforeach
    @foreach ($searchs as $search)
    

        <div class="well">
            <h3> Searched Result</h3>
            <hr>
            <div>
                <h4>{{$search->title}}</h4>
                <p>{!!$search->body!!}</p>
                @foreach ($search->tags as $tag)
                <span class="btn btn-primary">{{$tag->name}}</span>
                @endforeach
                
            </div>
        </div>
    @endforeach
    {!! $searchs->links()!!}
    {{-- {!! $searchs->count()!!}
    {!! $searchs->nextPageUrl()!!}
    {!! $searchs->previousPageUrl()!!} --}}
    {!! $searchs->lastPage()!!}
    <a href="{!! $searchs->previousPageUrl()!!}" class="btn btn-primary">Prev</a>
@endsection