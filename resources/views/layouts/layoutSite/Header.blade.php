<header class="header-area header-default header-style">
    <!--== Start Header Top ==-->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9 text-md-start text-center">
            
          </div>
         
            <div class="col-md-2 text-md-end text-center mt-sm-15">
        
            @if(Auth::user())@else
            <div class="theme-setting">
              <a class="dropdown-btn" href="{{route('login')}}" role="button">
              {{ __('Sign In') }}
               </a> 
            </div>
            <div class="theme-setting">
              <a class="dropdown-btn" href="{{route('register')}}" role="button">
              {{ __('Register') }}
               </a> 
            </div>
            @endif
          </div>
          <div class="col-md-1 text-md-end text-center mt-sm-15">
        
            <div class="theme-language">
              <a class="dropdown-btn" href="#" role="button">
                 {{ LaravelLocalization::getCurrentLocaleNative() }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                <a a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                      </a>
                </li>
                @endforeach
                 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Top ==-->

    <!--== Start Header Bottom ==-->
    <div class="header-bottom sticky-header hidden-md-down">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col col-12">
            <div class="header-align align-default">
              <div class="align-left">
                <div class="header-logo-area">
                  <a href="{{route('viewHomePage')}}">
                    <img class="logo-main" src="{{asset('storage/users/'. $header_logo )}}" width="170px" height="170px" alt="Logo" />
                   </a>
                </div>
                <div class="header-navigation-area hidden-md-down">
                  <ul class="main-menu nav position-relative">
                    <li><a href="{{route('viewHomePage')}}"> {{__('Home')}} </a></li> 

                    <li class="has-submenu" ><a >{{__('Shop by category')}}</a>
                      <ul class="submenu-nav">
                      @foreach($categories as $category)
                      <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$category->name}}
                          @else
                          {{$category->name_en}}
                          @endif @else
                          {{$category->name}}
                          @endif</a></li>
                     @endforeach
                         
                      </ul>
                    </li>
                    <li><a href="{{route('about')}}">{{__('About Us')}}</a></li> 
                    
                  </ul>
                </div>
              </div>
              <div class=" ">
                <div class="contact-link float-start">
                   
                </div>
                <div class="header-action-area float-start">
                  <div class="search-content-wrap">
                    <button class="btn-search">
                      <span class="icon icon-search icon-magnifier"></span>
                    </button>
                    <div class="btn-search-content">
                      <form action="{{ route('search_property')}}" method="GET">
                        <div class="form-input-item">
                          <input type="text" name="title" placeholder="Enter your search key ...">
                          <button type="submit" class="btn-src">
                            <i class="icon-magnifier"></i>
                          </button> 
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="shop-button-group">
                    <div class="shop-button-item">
                      <a class="shop-button" href="{{route('viewMyAccount')}}">
                        <i class="icon-user icon"></i>
                        <span style="font-size: 12px; color:#6f42c1;">{{ __('My account') }}</span>

                       </a>
                    </div>
                    <div class="shop-button-item">
                      <a class="shop-button" href="{{route('wishlist')}}">
                        <i class="icon-heart icon"></i>
                        <span style="font-size: 12px; color:#6f42c1;">{{ __('Favorite') }}</span>

                      </a>
                    </div>
                    <div class="shop-button-item">
                      <a class="shop-button" href="{{route('cart.index')}}">
                        <i class="icon-bag icon"></i>
                        <span style="font-size: 12px; color:#6f42c1;">{{ __('Cart') }} </span>
                       </a>
                    </div>
                    <div class="shop-button-item">
                        
                    </div>
                    <div class="shop-button-item">
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="responsive-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="header-item">
              <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-center">
              <div class="header-logo-area">
                <a href="index.html">
                  <img class="logo-main" src="{{asset('storage/users/'. $header_logo )}}" alt="Logo" />
                </a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-end">
            <a class="shop-button" href="{{route('viewMyAccount')}}">
             <button class="btn-cart" ><i class="icon-user"></i></button>
            </a>
            <a class="shop-button" href="{{route('wishlist')}}">
            <button class="btn-cart" ><i class="icon-heart"></i>  </button> 
           </a>
           <a class="shop-button" href="{{route('cart.index')}}">
            <button class="btn-cart" ><i class="icon-bag"></i>  </button> 
           </a>
           
            </div>
          </div>
          <div class="col-12">
            <div class="responsive-search-content">
              <form action="{{ route('search_property')}}" method="GET">
                <div class="form-input-item">
                  <input type="text" name="title" placeholder="{{__('Enter your search key ...')}}">
                  <button type="submit" class="btn-src">
                    <i class="icon-magnifier"></i>
                  </button> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </header>