
 @foreach($comments as $comment)
 <div class="display-comment">
     <div class="well">
 <strong>{{ $comment->user->name }}</strong>  {{'at '}}        {{$comment->created_at->format('l jS \\of F Y\\, h:i:s A')}}
     <p>{{ $comment->body }}</p>
     <a href="" id="reply"></a>

     
     {{-- {!! Form::open(['action'=> 'CommentsController@replyStore', 'method' => 'Post']) !!}

     <div class="form-group">
         {{form::text('comment_body','', ['class'=>'form-control','placeholder' => 'comment'])}}
         {{form::hidden('article_id',$articleShow->id, ['class'=>'form-control','placeholder' => 'comment'])}}
         {{form::hidden('comment_id',$comment->id, ['class'=>'form-control','placeholder' => 'comment'])}}
         {{form::hidden('comment_name',$comment->user->name, ['class'=>'form-control','placeholder' => 'comment'])}}
    
     </div>
     <div class="form-group">
             {{form::submit('reply',['class' => 'btn btn-warning'])}}
             
         </div>
     {!! Form::close() !!} --}}

     
            <!-- Button trigger modal -->
          
    <button type="button" class="btn btn-default text-center" data-toggle="modal" data-target="{{'#reply'.$comment->id}}">
        Reply
      </button>

      @if(!Auth::guest())

      @if(Auth::user()->id == $comment->user_id)
            
    <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="{{'#edit'.$comment->id}}">
            Edit
          </button>

    
          <button type="button" class="btn btn-danger text-center" data-toggle="modal" data-target="{{'#delete'.$comment->id}}">
                Delete
              </button>
      @endif
      @endif

      {{-- for reply --}}
      
      <!-- Modal -->
      <div class="modal fade" id="{{'reply'.$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          

              {{-- mmmmnnn --}}
              {!! Form::open(['action'=> ['CommentsController@replyStore', $comment->id],'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
              <div class="modal-body">
             

              <div class="form-group">
                  {{form::label('comments','Comment',['class'=>'text-uppercase'])}}
                  {{form::hidden('article_id',$articleShow->id, ['class'=>'form-control','placeholder' => 'comment'])}}
         {{form::hidden('comment_id',$comment->id, ['class'=>'form-control','placeholder' => 'comment'])}}
         {{form::hidden('comment_name',$comment->user->name, ['class'=>'form-control','placeholder' => 'comment'])}}
    
                  {{form::text('comment','' ,['class' => 'form-control', 'placeholder' => 'Comment'])}}
              </div>
              
           
              {{-- mmmmm --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              {{-- {{form::hidden('_method','PUT')}} --}}
                  {{form::submit('Save',['class' => 'btn btn-primary'])}}
                  
            
           
            </div>
          </div>
        </div>
      </div>

       
      {!! Form::close() !!}




      
      {{-- for editing --}}
      
      <!-- Modal -->
      <div class="modal fade" id="{{'edit'.$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
    
                  {{-- mmmmnnn --}}
                  {!! Form::open(['action'=> ['CommentsController@update', $comment->id],'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                  <div class="modal-body">
                 
    
                  <div class="form-group">
                      {{form::label('comments','Edit Comment',['class'=>'text-uppercase'])}}
                      {{form::hidden('article_id',$articleShow->id, ['class'=>'form-control','placeholder' => 'comment'])}}
             {{form::hidden('comment_id',$comment->id, ['class'=>'form-control','placeholder' => 'comment'])}}
             {{form::hidden('comment_name',$comment->user->name, ['class'=>'form-control','placeholder' => 'comment'])}}
        
                      {{form::text('comment',$comment->body ,['class' => 'form-control', 'placeholder' => 'Comment'])}}
                  </div>
                  
               
                  {{-- mmmmm --}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  {{-- {{form::hidden('_method','PUT')}} --}}
                      {{form::submit('Update',['class' => 'btn btn-primary'])}}
                      
                
               
                </div>
              </div>
            </div>
          </div>
    
           
          {!! Form::close() !!}




          
      {{-- for reply --}}
      
      <!-- Modal -->
      <div class="modal fade" id="{{'delete'.$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Confirm Action<i class="fas fa-audio-description    "></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
    
                  {{-- mmmmnnn --}}
                  {!! Form::open(['action'=> ['CommentsController@destroy', $comment->id],'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                  <div class="modal-body">
                 
    
                  <div class="form-group">
                      {{form::label('comments','Are you sure you want to delete this ',['class'=>'text-uppercase'])}}
             
                   
                  </div>
                  
               
                  {{-- mmmmm --}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  {{-- {{form::hidden('_method','PUT')}} --}}
                      {{form::submit('Delete',['class' => 'btn btn-primary'])}}
                      
                
               
                </div>
              </div>
            </div>
          </div>
    
           
          {!! Form::close() !!}
     </div>
      
     {{-- @include('partials._comment_replies', ['comments' => $articles->comments, 'article_id' => $articles->id]) --}}
     @include('partials._comment_replies', ['comments' => $comment->replies])
     {{-- @include('partials._comment_replies') --}}
 </div>
@endforeach
