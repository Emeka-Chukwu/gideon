@extends('layouts.app')
    @section('contents')

           
    <div class="container">
    <div class="jumbotron text-center">
           
              <h3>The Journey Of the Strong</h3>
              <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
              <p><a class="btn btn-primary btn-lg" href="/about" role="button">Learn more »</a></p>
            </div>
          </div>
        <div class="flex-center position-ref full-height">



                <h1 class="success text-center"> Gideon Watch</h1>
                

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                </div>

             
            </div>
        </div>
          
    </div>



@endsection
