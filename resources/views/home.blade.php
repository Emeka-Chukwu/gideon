@extends('Front.master')

@section('contents')
@foreach ($articles as $article)
    
@endforeach
<div class="containr">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                            {{-- initial value --}}
                    {{-- <div>
                        @foreach ($user->articles as $yourArticles)
                            <div>
                                <hr>
                                <h3>{{$yourArticles->title}} </h3>
                                
                            </div>
                           
                        @endforeach
                    </div> --}}

                    
                    <div>
                        
                            @if(count($user->articles) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($user->articles as $post)
                                    <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/articles/{{$post->id}}/edit" class="btn btn-default">Edit</td>
                                        <td>
                                                {!! Form::open(['action'=> ['ArticlesController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}    
                                                {{form::hidden('_method','DELETE')}}
                                               {{form::submit('Delete',['class' => 'btn btn-danger'])}}                                                                           
                                               {!!form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else 
                            <p>You have no posts</p>    
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
