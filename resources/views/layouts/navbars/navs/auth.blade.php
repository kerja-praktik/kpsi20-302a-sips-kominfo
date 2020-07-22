


<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Sistem Informasi Pusat Statistik </a>
        
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="nav navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
               
                 
           
                    <a class="nav-links" href=" {{route('profile.edit') }} ">
                   
                        <span class="no-icon">{{ Auth::user()->username }}</span>
                    </a>
               
                
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf 
                        <a class="text-dangers" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

