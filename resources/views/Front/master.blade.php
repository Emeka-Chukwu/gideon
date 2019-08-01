@include('layouts.app')

<div class="container" style="background:whi; posit">
        
    <div class="row" style="position:relative">
 
            <div class="text-cen text-danger" style="background:white;">
                    <h3 class="text-uppercase text-center" style="padding-top: 30px">The-Gideon-Watch</h3>
               
           
       
           {{-- <form class="form-inline my-2 my-lg-0" action="ArticlesController@search">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Searcph</button>
        </form> --}}
        <br>
      </div>
                
                  
                    <div id="app" style=" position:sticky; top:0; z-index:1">
                            @include('inc.messages')
                            @include('inc.navbar')
                           
                         </div>
                         
                    {{-- h3.text-uppercase   --}}
               
               
                <i class="fas fa-google-play    "></i>

        <div class="col-md-3" style="background-color: white;top:20%; position:sticky; height:auto">
          <div class="sticky" style="position:sticky; top:3px">
                @include('categories.index',['categories' => $categories])
          </div>
        </div>

        <div class="col-md-6 ml-1" style=" position:stick; top:0%">
            @yield('contents')
        </div>


        <div class="col-xs-11 col-md-3" style="background-color: white; position:sticky; top:10%; ">

          <div class="well" style="margin-top: 25px">
            <h3 class="textRed">Subscribe</h3>
             
{!! Form::open(['action'=> 'PagesController@subscribe', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
  {{form::label('name','Name')}}
  {{form::text('name', '',['class' => 'form-control', 'placeholder' => 'Name'])}}
  </div>

  <div class="form-group">
    {{form::label('email','Email')}}
    {{form::text('email', '',['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
<div class="form-group">
  {{form::submit('Subscribe',['class' => 'btn btn-danger'])}}
  
</div>
{!! Form::close() !!}
        </div>

<h3 class="textRed">Coming Events</h3>


            <?php $counter = 0; ?>

            <div class="row">
              <div class="col-md-12">
            <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel" style="width:95%">
            <ol class="carousel-indicators">
            @foreach ($articles as $image)
              <li data-target="#dynamic_slide_show" data_slide_to="{{$counter}}" class="{{$loop->first ? 'active' : ''}}"></li>
                
              <?php $counter = $counter + 1;?>
            @endforeach 
            </ol> 
            <div class="carousel-inner">
              @foreach ($articles as $image)
                  <div class="carousel-item item {{$loop->first ? 'active' :''}}">
                      <img src="/storage/cover_image/{{$image->image}}" alt="$image->title">
                      <div class="carousel-caption">
                        <h3>{{$image->title}}</h3>
                        <p>{{$image->body}}</p>
                      </div>
                  </div>
              @endforeach
            </div>
            <a class="left carousel-control" href="#dynamic_slide_show" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left">
                </span>
                <span class="sr-only">Previous</span>
            </a>
    
               <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span> -->
    
    
              
    
             <a class="right carousel-control" href="
              #dynamic_slide_show"  role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              
                <span class="sr-only">Next</span>
            </a>
            </div>
         
    
    
              <!-- <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> -->
    </div>
    </div>



            
       {{-- <br><br><br> --}}


        <?php $counter = 0; ?>

        <div class="continer">
          <h3 class="textRed">Recent Articles</h3>
          {{-- {{$articles}} --}}
          {{-- {{$categories->articles}} --}}
          
              @foreach ($articles as $article)
                  <div class="text-justify">
                    <hr>
                  <a href="/articles/{{$article->id}}"> {{$article->title}} </a>
                  </div>
              @endforeach
        </div>


        <div class="continer">
          <h3 class="textRed">Recent Articles</h3>
          {{-- {{$articles}} --}}
          {{-- {{$categories->articles}} --}}
          
              @foreach ($articles as $article)
                  <p class="">
                  <a href="/articles/{{$article->id}}"> {{$article->title}} </a>
                  </p>
              @endforeach
        </div>

</div>
    </div>


   

        
  
 
   
  
    
    </div>
    



        <footer style="background-color:black; color:aliceblue; bottom:0" class="text-center" >  
    
            <div class="container">
        <p> This is the footer section </p>
        <h2> this is from master layouts app that was included in the master</h2>
    </div>
</footer>





   <!-- Scripts -->
   {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
   {{-- <script src="{{ asset {'js/jquery.min.js')}}"></script> --}}
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/parsley.min.js') }}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>
   {{-- <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script>
    $(document).ready(function(){
      $('.select2-multi').select2();
    });
  	
  </script>
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
   <script>
       CKEDITOR.replace( 'article-ckeditor' );
   </script>
</body>
</html>
