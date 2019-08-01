@include('layouts.app')

<div class="container">
    <div class="row">
        {{-- <div class="col-xs-4 "> --}}
            {{-- the category section would be written here --}}
        {{-- </div> --}}
    </div>
</div>

<div class="container" style="background-color: white; margin:50px auto; ">
    <div class="text-center text-danger">
        <h3 class="text-uppercase">The-Gideon-Watch</h3>
        <hr>
        {{-- h3.text-uppercase   --}}
    </div>
<div class="row" >
  <div class="col-xs-12 col-md-3">
        {{-- @include('categories.index',['categories' => $categories]) --}}
     @include('categories.index',['categories' => $categories])
     {{-- @include('partials._comment_replies', ['comments' => $articles->comments, 'article_id' => $articles->id]) --}}
  </div>
    <div class="col-xs-12  col-md-6">
            {{-- @include('inc.navbar') 
            style="background-color:green; margin-right:2px
            --}}
        
        @yield('contents')
        
  
   </div><!--/.col-xs-6.col-lg-4-->
   
  
    <div class="col-xs-11 col-md-3" style="background-color: white; margin:0px auto">
       
        <h3>Coming Events</h3>
        <p><b class="text-danger">Name :</b> The name of the event</P>
        <p><b>Time :</b> The time of the event</P>
        <p><b>Venue :</b> The Venue of the event</P>
        {{-- include the events at the side bar of the site --}}
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div><!--/.col-xs-6.col-lg-4-->
    </div>
    
</div>


        <footer style="background-color:navy" class="text-center">  
    
            <div class="container">
        <p> This is the footer section </p>
        <h2> this is from master layouts app that was included in the master</h2>
    </div>
</footer>




   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>

   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
   <script>
       CKEDITOR.replace( 'article-ckeditor' );
   </script>
</body>
</html>
