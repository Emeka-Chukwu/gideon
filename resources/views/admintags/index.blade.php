@extends('Front.admin')
@section('contents')



        <h3 class="text-capitalize text-cent"> the tag section of the articles</h3>

        @foreach ($tags as $tag)
            <div class="well">{{$tag->name}}
            {{-- <span class="pull-right"><a href="/admin/admintags/{{$tag->id}}/edit" class="btn btn-primary"> Edit</a></span>
            <span>
            {!! Form::open(['action'=> ['Admin\TagsController@destroy', $tag->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
            {{form::hidden('_method','DELETE')}}
            {{form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!form::close()!!} --}}
            {{-- </span> --}}




            {{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}

            <span class="pull-right">
                <!-- Button trigger modal -->
              
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="{{'#edit'.$tag->id}}">
            Edit 
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="{{'edit'.$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
    
                  {{-- mmmmnnn --}}
                  {!! Form::open(['action'=> ['Admin\TagsController@update', $tag->id],'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                  <div class="modal-body">
                 
    
                  <div class="form-group">
                      {{form::label('tags','Edit Tag',['class'=>'text-uppercase'])}}
                      {{form::text('tag',$tag->name ,['class' => 'form-control', 'placeholder' => 'Categories'])}}
                  </div>
                  
               
                  {{-- mmmmm --}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  {{form::hidden('_method','PUT')}}
                      {{form::submit('Update',['class' => 'btn btn-primary'])}}
                      
                
               
                </div>
              </div>
            </div>
          </div>
  
           
          {!! Form::close() !!}
  
          </span>
          <span class="pull-right" style="margin-right:20px">
              <div class="row text-center">
                  
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="{{'#delete'.$tag->id}}">Delete</a>
              </div>
              
            
            
            
            <div class="modal fade" id="{{'delete'.$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Please Confirm</h4>
                  </div>
                  <div class="modal-body">
                    <h3> Are you sure you want to delete this tag</h3>
                  </div>
                  <div class="modal-footer">
                          {!! Form::open(['action'=> ['Admin\TagsController@destroy', $tag->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
                          {{form::hidden('_method','DELETE')}}
                          {{form::submit('Delete',['class' => 'btn btn-danger'])}}
                          {!!form::close()!!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                   
                  </div>
                </div>
              </div>
            </div>
            {{-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh --}}
           
      
  
          
            
            {!! Form::close() !!}
          </span>

            </div>
        @endforeach

 
@endsection