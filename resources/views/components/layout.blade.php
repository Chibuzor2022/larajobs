<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">

        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
       

        <script src="//unpkg.com/alpinejs" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
      
        <title>LaraJobs | Find Laravel Jobs & Projects</title>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container">
                <a href="/"
                    ><img  src="{{asset('images/logo.png')}}" alt="" class="logo"
                /></a>
                <div>
                
                    @auth
                    
                    <ul class="navbar-nav ms-auto">
                        <li class="me-2">
                            <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                        </li>
                        <li class="me-2">
                            <a href="/" class="hover:text-primary"
                                ><i class="fa fa-home"></i> Home</a
                            >
                        </li>
                        <li class="me-2">
                            <a href="/listings/create" class="hover:text-primary"
                                ><i class="fa fa-briefcase"></i> Post a Job</a
                            >
                        </li>
                        
                    <li class="me-2">
                        <a href="/listings/manage" class="hover:text-primary"
                            ><i class="fa-solid fa-gear"></i>
                            Manage Listings</a
                        >
                    </li>
                    <li>
                        <form class="inline hover:text-primary" method="POST" action="/logout">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i>Logout
                            </button>
                                           
                        </form>
                    </li>
                    @else
                    <ul class="navbar-nav ms-auto">
                        <li class="me-2">
                            <a href="/" class="hover:text-primary"
                                ><i class="fa fa-home"></i> Home</a
                            >
                        </li>
                        <li class="me-2">
                            <a href="/listings/create" class="hover:text-primary"
                                ><i class="fa fa-briefcase"></i> Post a Job</a
                            >
                        </li>
                    <li class="me-2">
                        <a href="/register" class="hover:text-primary"
                            ><i class="fa-solid fa-user-plus"></i> Register</a
                        >
                    </li>
                   
                    <li>
                        <a href="/login" class="hover:text-primary"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>
                    @endauth
                </ul>
                </div>
                </div>
            </nav>
     
  <main>

    {{$slot}}
  </main>

  
<footer
class=" gradient  bottom-0 left-0 w-full flex items-center justify-start font-bold text-white h-24  opacity-90 md:justify-center"
>

<p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

</footer>
<x-flash-message/>
<script src="{{asset('botstrap/js/bootstrap.bundle.js')}}"></script>
</body>
</html>
