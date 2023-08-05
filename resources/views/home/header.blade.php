 <!-- header section strats -->
 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categories <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     @foreach($categories as $category)
                        <li><img width="30" height="30" src="{{ url($category->category_img) }}" /><a href="about.html">{{ $category->category_name }}</a></li>
                     @endforeach
                  </ul>
               </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/products') }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/blogs') }}">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
                @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/redirect') }}" class="nav-link btn btn-primary">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link btn btn-primary">Log in</a></li>

                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link btn btn-success ">Register</a></li>
                            @endif
                        @endauth
                @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>
 <!-- end header section -->