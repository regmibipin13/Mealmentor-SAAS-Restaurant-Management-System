 {{-- Header Section --}}
 <header id="header">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-md-9 col-12 logo-box">
                 <a href="{{ route('frontend.home') }}">
                     <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" width="200"></a>
             </div>
             <div class="col-md-3 col-12 menu-box d-flex align-items-center justify-content-between">
                 @auth
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                         data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         {{ Auth::user()->name }}
                     </a>

                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="#">
                             {{ __('Dashboard') }}
                         </a>
                         @if (!auth()->user()->is_admin_side)
                             <a class="dropdown-item" href="{{ route('frontend.carts.index') }}">
                                 {{ __('My Carts') }}
                             </a>
                             <a class="dropdown-item" href="#">
                                 {{ __('My Orders') }}
                             </a>
                             <a class="dropdown-item" href="#">
                                 {{ __('My Addresses') }}
                             </a>
                         @endif
                         <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 @else
                     <a href="{{ route('login') }}" class="mm-button bg-none-button">Login</a>
                     <a href="{{ route('register') }}" class="mm-button bg-theme-button">Register</a>
                     <a href="{{ route('frontend.carts.index') }}" class="mm-button bg-cart-button cart-button">
                         <i class="fa-solid fa-cart-shopping"></i>
                         <span class="cart-quantity">1</span>
                     @endauth

                 </a>
             </div>
         </div>
     </div>
 </header>
 {{-- Header Sections Ends --}}
