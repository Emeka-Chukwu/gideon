@extends('Front.admin')
@section('contents')
@if (count($categories))
    @foreach ($categories as $category)
    <div class="well">{{$category->cat}}
        {{-- <span class="pull-right"><a href="/admin/categories/{{$category->id}}/edit" class="btn btn-primary"> Edit</a></span> --}}
        <?php $id = $category->id;?>
        <span class="pull-right">
              <!-- Button trigger modal -->
              
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="{{'#edit'.$category->id}}">
          Edit 
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="{{'edit'.$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            
  
                {{-- mmmmnnn --}}
                {!! Form::open(['action'=> ['CategoriesController@update', $category->id],'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                <div class="modal-body">
               
  
                <div class="form-group">
                    {{form::label('category','Edit Category',['class'=>'text-uppercase'])}}
                    {{form::text('category',$category->cat.' '.$category->id ,['class' => 'form-control', 'placeholder' => 'Categories'])}}
                </div>
                
             
                {{-- mmmmm --}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{form::hidden('_method','PUT')}}
                    {{form::submit('Save',['class' => 'btn btn-primary'])}}
                    
              
             
              </div>
            </div>
          </div>
        </div>

         
        {!! Form::close() !!}

        </span>
        <span class="pull-right" style="margin-right:20px">
            <div class="row text-center">
                
                <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="{{'#delete'.$category->id}}">Delete</a>
            </div>
            
          
          
          
          <div class="modal fade" id="{{'delete'.$category->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Please Confirm</h4>
                </div>
                <div class="modal-body">
                  <h3> Are you sure you want to delete this category</h3>
                </div>
                <div class="modal-footer">
                        {!! Form::open(['action'=> ['CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right']) !!} 
                        {{form::hidden('_method','DELETE')}}
                        {{form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!form::close()!!}
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                 
                </div>
              </div>
            </div>
          </div>
          {{-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh --}}
         
    
s
        
          
          {!! Form::close() !!}
        </span>
    </div>
    @endforeach
    
@endif



       


@endsection





