@extends('Front.admin')
@section('contents')
   
        @if (count($posts)>0)
        <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th> 
                            S/N
                        </th>
                        <th> 
                            Name
                        </th>
                        <th> 
                            Title
                        </th>
                        <th> 
                            Published
                        </th>
                
                    </tr>
                </thead>
                <tbody>
                <?php $count = 0; ?>
    
                @foreach ($posts as $post)
                <?php $count++;?>
                <tr>
                    <th scope="row">{{$count}}</th>
            
                    <td>{{$post->user->name}}</td>
                    <td> <a href="adminarticles/{{$post->id}}">{{$post->title}}  </a></td>
                    <td>{{$post->created_at}}</td>
                    
                </tr>
    
                @endforeach
            
                </tbody>
            </table>

        @else
        <p class="text-center text-danger text-capitalize margin-top"> You have no article to confirm</p>
        
        @endif
    
        
           


@endsection