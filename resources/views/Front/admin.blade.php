@include('layouts.app')

@include('layouts.app')

<div class="container" style="background:whi; posit">
        
    <div class="row" style="position:relative">

            <div class="text-center text-danger" style="background:white; position:stick; top:0">
                    <h3 class="text-uppercase" style="padding-top: 30px">The-Gideon-Watch</h3>
    
                    <hr>
                  
                    <div id="app">
          
                            @include('inc.navbar')
                            @include('inc.messages')
                           
                         </div>
                    {{-- h3.text-uppercase   --}}
                </div>
                <h3 class="text-capitalize text-center"> {{'Welcome Adminstrator '.Auth::user()->name}} </h3>

        <div class="col-md-4 col-sm-10 col-xs-11" style="background-color: white;top:20%; position:sticky; height:auto">
          <div class="sticky" style="position:stick; top:3px">
              @include('inc.adminside')
              <br>
          </div>
        </div>

        <div class="col-md-8 col-xs-10" style=" position:stick; top:20%">
            @yield('contents')
        </div>
        <br>

      
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

   

        
  
 
   
  
    
    </div>