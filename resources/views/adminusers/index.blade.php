@extends('Front.admin')
@section('contents')
    
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th> 
                        S/N
                    </th>
                    <th> 
                        Name
                    </th>
                    <th> 
                        Email
                    </th>
                    <th> 
                        Joined
                    </th>
            
                </tr>
            </thead>
            <tbody>
            <?php $count = 0; ?>

            @foreach ($users as $user)
            <?php $count++;?>
            <tr>
                <th scope="row">{{$count}}</th>
        
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                
            </tr>

            @endforeach
        
            </tbody>
        </table>
           
   
@endsection