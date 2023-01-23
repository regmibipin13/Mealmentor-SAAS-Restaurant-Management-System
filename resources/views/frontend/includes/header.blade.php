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
                         @if (auth()->user()->user_type == App\Models\User::USER_TYPE['admin'])
                             <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                 {{ __('Dashboard') }}
                             </a>
                         @elseif (auth()->user()->user_type == App\Models\User::USER_TYPE['restaurant_owner'])
                             <a class="dropdown-item" href="{{ route('restaurants.dashboard') }}">
                                 {{ __('Dashboard') }}
                             </a>
                         @endif
                         @if (auth()->user()->user_type == App\Models\User::USER_TYPE['customer'])
                             <a class="dropdown-item" href="{{ route('home') }}">
                                 {{ __('Dashboard') }}
                             </a>
                             <a class="dropdown-item" href="{{ route('frontend.online-orders.index') }}">
                                 {{ __('My Orders') }}
                             </a>
                             <a class="dropdown-item" href="{{ route('frontend.addresses.index') }}">
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
                     @if (auth()->user()->user_type == App\Models\User::USER_TYPE['customer'])
                         <a href="{{ route('frontend.carts.index') }}" class="mm-button bg-cart-button cart-button">
                             <i class="fa-solid fa-heart"></i>
                             {{-- <span class="cart-quantity">1</span> --}}
                         </a>
                         <a href="{{ route('frontend.carts.index') }}" class="mm-button bg-cart-button cart-button">
                             <i class="fa-solid fa-cart-shopping"></i>
                             {{-- <span class="cart-quantity" v-cloak>@{{ cartCount }}</span> --}}
                         </a>
                     @endif
                 @else
                     <a href="{{ route('login') }}" class="mm-button bg-none-button">Login</a>
                     <a href="{{ route('register') }}" class="mm-button bg-theme-button">Register</a>
                     <a href="{{ route('frontend.carts.index') }}" class="mm-button bg-cart-button cart-button">
                         <i class="fa-solid fa-cart-shopping"></i>
                         <span class="cart-quantity">1</span>
                     </a>
                 @endauth


             </div>
         </div>
     </div>
 </header>
 {{-- Header Sections Ends --}}
