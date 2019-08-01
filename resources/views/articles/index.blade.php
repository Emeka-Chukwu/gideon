@extends('Front.master')
    @section('contents')
   <div style="background: white">
    @if(count($articles) > 0)
    <br>
    <h3 class="textRed text-left container text-uppercase" style="font-size:bold"> Recent Articles</h3>
    <hr style="background:yellow">
        {{-- {{count($articles)}} --}}
    @foreach ($articles as $article)
    <div class="row" style="background-color: white; margin:20px auto">
            <div class="col-xs-11 col-sm-4 col-md-5">
                <img src="/storage/cover_image/{{$article->image}}" style="max-width:95%">
            </div>

            <div class="col-xs-11 col-sm-7 col-md-7">
                <h3 class="">{{$article->title}}</h3>
                   <small class="text-primary text-uppercase">{{$article->categories->cat}}</small><br>
                    
                    <small class="text-capitalize">{{$article->user->name}} 
                        {{-- {{$article->created_at->format('d/m/y')}} --}}
                            {{$article->created_at->format('l jS \\of F Y\\, h:i:s A')}}
                        {{-- {{date('d/m/y', strtotime($article->created_at))}} --}}
                        <?php $total = 0 ;?>
                        <?php $totalComments = 0; 
                        $totalReplies = 0;
                        $totalComment=0?>

   
                           
                @foreach ($article->comments as $comment)
                <?php $totalComment = count($article->comments);
                // count($comment->commentable_id);
                $totalComments += $totalComment  ; ?>
            
                {{-- {{$comments->cat}} --}}
                {{-- {{$comment->replies.'emeka chueke'}} --}}
             

                @foreach ($comment->replies as $reply)
                <?php $totalReply = count($comment->replies);
                // count($reply->commentable_id);
                $totalReplies += $totalReply  ;
                // $totalReplies; ?> 
                
                @endforeach
               
              @endforeach
              {{-- {{$article->comments}} --}}
          
            <?php $total = $totalComments+$totalReplies; ?>

         
              @if ($total == 0)
                  {{'LEAVE A COMMENT'}} 
              @elseif($total == 1))
                   {{$total.' COMMENT'}}   
              @else
               {{$total.' COMMENTS'}}  

              @endif
              @foreach ($comments as $comment)
              <?php $totalComment = count($comments);
                    $totalComments += $totalComment ?>
          @endforeach

              {{-- </p> 
               @if ($article->id == $article->comments->commentabl e_id)
              @endif --}}
             
              <p>
                  {!!str_limit($article->body, 250)!!}
              </small>
            <p><a class="btn btn-danger" href="/articles/{{$article->urlnum}}/{{$article->slug}}/{{$article->id}}">Read More</a></p>
            {{-- <a  href="{{ route('articles.show', $article->title) }}" > <button class="btn btn-primary">Więcej</button></a> --}}

           
      </div>
   
        {{-- {{$article->categories}} --}}

        {{-- {{$slug = str_slug('my name is emeka')}}      --}}
  </div>
  <hr>

                
                
        @endforeach
        

  {{-- <a href=" {!!$articles->nextPageUrl()!!}" class="btn btn-primary">next</a> --}}
  {{-- {{$articles->perPage()}} --}}
  {{-- {{$articles->total()}} --}}
  {{-- {{$articles->perPage()}} --}}
  <h4>{{$articles->links()}} </h4>
  

    @endif
    {{-- @foreach($categories as $category) 
       <div class="well">     {{$category->cat}}</div> --}}
        {{-- {{$category->articles. 'nnn'}} --}}
        {{-- @foreach ($category->articles as $title)
            <div>{{$title->title}}</div>
        @endforeach --}}
            {{-- {{$category}} --}}
      
            
    {{-- @endforeach  --}}
   </div>

 

    @endsection