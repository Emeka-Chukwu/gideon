{{-- <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="/">{{config('app.name','Gideon-Watch')}}</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/services">Services</a></li>
              <li><a href="/events">Events</a></li>
            </ul>
          </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
      </nav><!-- /.navbar -->

 --}}

      
          
    

      <nav class="navbar navbar-default navbafixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.nasme', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                   
                      <li class="{{Request::is('/')?'active':''}}"><a href="/">Home</a></li>
                      <li class="{{Request::is('about')?'active':''}}"><a href="/about">About</a></li>
                      <li class="{{Request::is('contact')?'active':''}}"><a href="/contact">Contact</a></li>
                      {{-- <li class="{{Request::is('services')?'active':''}}"><a href="/services">Services</a></li> --}}
                      <li class="{{Request::is('events')?'active':''}}"><a href="/events">Events</a></li>
                      <li class="{{Request::is('articles')?'active':''}}"><a href="/articles">Blog</a></li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                  
                    <li>
                            <div class="form-group" >
                         {!! Form::open(['action'=> 'ArticlesController@search' ,'class' => 'form-inline my-2 my-lg-0', 'method' => 'Get']) !!}
             
                        {{form::text('search','',['class' => 'form-control mr-sm-2', 'placeholder' => 'Search'])}}
                        {{form::submit('Search',['class' => 'btn btn-outline-success my-2 my-sm-0'])}} 
                        
                        {!! Form::close() !!}
                       </div>
                    </li>
                    
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="{{Request::is('login')?'active':''}}"><a href="{{ route('login') }}">Login</a></li>
                        <li class="{{Request::is('register')?'active':''}}"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/home">Home</a></li>
                                <li><a href="/articles/create">create article</a></li>
                                <li><a href="/events/create">create event</a></li>
                                @if (Auth::user()->is_admin == 1)
                                 
                                <li><a href="/admin/admintags">Admin</a></li>
                                
                               
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    {{-- the search area form bootstrap --}}

    {{-- <li>     <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form></li> --}}