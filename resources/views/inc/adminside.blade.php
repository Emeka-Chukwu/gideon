<h2> Adminstration</h2>
<ul class="nav ">  
<li class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{'Category'}} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            {{-- <li><a href="/admin/categories">Categories</a></li> --}}
            {{-- <li><a href="/admin/categories/">All</a></li> --}}
            <li><a href="/admin/categories/all">All</a></li>
            <li><a href="/admin/categories/create">Create</a></li>
           
          
         
        </ul>
    </li>
</ul>

    <ul class="nav">   
<li class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{'Tag'}} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="/admin/admintags">Tags</a></li>
           
            <li><a href="/admin/admintags/create">Create Tags</a></li>
          

           
        </ul>
    </li>
    </ul>


    <ul class="nav">   
            <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{'Articles'}} <span class="caret"></span>
                    </a>
            
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/adminarticles">Validate Articles</a></li>
                        <li><a href="/admin/adminarticles/create">Create</a></li>
                     
                    </ul>
                </li>
                </ul>


                <ul class="nav">   
                        <li class="dropdown ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{'Users'}} <span class="caret"></span>
                                </a>
                        
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/admin/adminusers">Members</a></li>
                                    @if (Auth::user()->is_admin >0)
                                    <li><a href="/admin/adminusers/moderators">Moderators</a></li>
                                    @endif
                                    
                                </ul>
                            </li>
                            </ul>


                
            <ul class="nav">   
                <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{'Send Email'}} <span class="caret"></span>
                        </a>
                
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/emails/subscribers/create">Send Mail</a></li>
                          
                            
                        </ul>
                    </li>
                    </ul>