{{-- @foreach ($categories as $category)
    <div class="well">{{$category->cat. ' with an id of '.$category->id}}    </div>
    {{-- @foreach ($articles as $category)
        <div class="well-lg">
            {{$category}}
        </div>
    @endforeach 
@endforeach --}}
{{-- @foreach($categories as $category)  --}}

 {{-- {{$category->articles. 'nnn'}} --}}
 

{{-- <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     {{$category->cat}}
              </button>
            </h5>
          </div>
          `  @foreach ($category->articles as $title)
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                   
                    <div>{{$title->title}}</div>
                    
            </div>
          </div>
          @endforeach
        </div>
        @endforeach --}}

     <?php   
    //  $collapse = array();
     $collapse = ['collapseOne', 'collapseTwo','collapseThree', 'collapseFour', 'collapseFive', 'collapseSix', 'collapseSeven', 'collapseEight'];
            $heading = ['headingOne','headingTwo','headingThree','headingFour','headingFive','headingSix','headingSeven','headingEight','headingNine','headingTen'];
          // echo $collapse[1];
          $categoryCounter =  -1;
          $titleCounter = -1;
            
      ?>

        <br>
{{--  --}}
        <h3 class="text-center text-primary text-uppercase">
          The Categories
        </h3>


@foreach ($categories as $category)
        <?php $categoryCounter = $categoryCounter + 1; ?>
    
<div id="accordion" class="text-center">
  <div class="card">
  <div class="card-header" id="{{$heading[$categoryCounter]}}">
      <h5 class="mb-0">

      <button class="btn btn-danger" data-toggle="collapse" data-target="{{'#'.$collapse[$categoryCounter]}}" aria-expanded="true" aria-controls="{{$collapse[$categoryCounter]}}">
          {{$category->cat}}
        </button>
      </h5>
    </div>
    
          
     
    <div id="{{$collapse[$categoryCounter]}}" class="collapse" aria-labelledby="{{$heading[$categoryCounter]}}" data-parent="#accordion">
      <div class="card-body">
          @foreach ($category->articles as $title)
          <hr>
          <p class=""><a href="articles/{{$title->id}}"> {{$title->title}}</a></p>
  @endforeach

    </div>
  </div>
  </div>
</div>
@endforeach
{{-- <style>
  .horizontalLine hr{
    border-bottom: 3px solid lightgray;
  }
  </style> --}}
 <div class="horizontalLine">
  <hr>
 </div>


<div class="">
    <h5 class="text-center textRed text-uppercase">
      Contributors
    </h5>
<?php
    $contributors = array("titlechecking");
    ?>
    @foreach ($articles as $profile)
      <?php $profileImage = $profile->user->name ; ?>
      @if(in_array($profileImage, $contributors))
          {{-- {{'yeah'." $contributors"}} --}}
      @else
        <div class="row">
          <div class="col-md-5">
              <img src="/storage/cover_image/{{$article->image}}" style="max-width:95%">
          </div>
          <div class="col-md-7">
             <p>{{  $profile->user->name }}</p>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="text-center">  {{$profile->title}} </p>
            </div>
          </div>
          
     
     <?php array_push($contributors, strval($profile->user->name)); ?>
      {{-- {{$contributors}} --}}
        </div>
<?php 
// $marks = array(100, 65, 70, 87); 
  
// if (in_array("100", $marks)) 
//   { 
//   echo "found"; 
//   } 
// else
//   { 
//   echo "not found"; 
  // } 
?> 
          
      @endif
        
    @endforeach



</div>


{{-- @foreach ($user as $user)
    
@endforeach --}}




    <div>
                


                
  
    </div>