@extends('Front.master')
@section('contents')
  
                        
        <div class="well">
            <h1 class="text-primary text-center">
                The About Page
            </h1>
            <p>Gideon watch is an online platform that is established to help the christian faithfuls to keep soaring in the faith and encourages and help anyone that is struggling in his/her personal relationship with our lord Jesus Christ.

                with the vision of making the best out of every christian by being of help to others and by so doing draw those that have not reconciled with God unto him.
                
                it is the will of God that every sinner should repent and return back him, we at the gideon watch have taken this desire of Our as our burden and there call out to everyone born of woman who has not given his life to him or has not accepted him to do so now that there is an ipportunity to do so.  we therefore urge people to publish articles or posts our platform so that our fellow christian faithful will keeping soaring in the faith
                 
                </p>
        </div>
    @foreach ($articles as $article)
         
    @endforeach
    @foreach($categories as $category)
    @endforeach
@endsection