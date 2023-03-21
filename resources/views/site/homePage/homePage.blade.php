@extends('layouts.layoutSite.SitePage')
@section('content')

    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area">
      <div class="swiper-container swiper-pagination-style home-slider-container default-slider-container">
        <div class="swiper-wrapper home-slider-wrapper slider-default">
        @foreach($carousels as $carousel)
          <div class="swiper-slide">
            <div class="slider-content-area" data-bg-img="{{asset('/storage/property/'.$carousel->image)}}">
              <div class="container">
                <div class="row justify-content-end">
                  <div class="col-10 col-sm-6 col-md-5">
                    <div class="slider-content animate-pulse">
                      <h5 class="sub-title transition-slide-0"> 
                            @if($carousel->text_en != null)
                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                {{$carousel->text}}
                                @else
                                {{$carousel->text_en}}
                                @endif @else
                                {{$carousel->text}}
                                @endif
                      </h5>
                      <h2 class="title transition-slide-1 mb-0"><span class="font-weight-400"> 
                               @if($carousel->title_en != null)
                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                {{$carousel->title}}
                                @else
                                {{$carousel->title_en}}
                                @endif @else
                                {{$carousel->title}}
                                @endif
                      </span></h2>
                      <h2 class="title transition-slide-2"> 
                      @if($carousel->subtitle_en != null)
                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                {{$carousel->subtitle}}
                                @else
                                {{$carousel->subtitle_en}}
                                @endif @else
                                {{$carousel->subtitle}}
                                @endif
                      </h2>
                      <a class="btn-slide transition-slide-3" href="{{$carousel->link}}">{{__('Shop now')}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          @endforeach
 

        </div>

        <!--== Add Swiper Pagination ==-->
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container pt-95 pt-lg-70">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">{{__('Latest products')}}</h2>
              
            </div>
          </div>
        </div>
        <div class="container pt-20 pb-80">
        <div class="row">
            @foreach($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3">
                <!--== Start Shop Item ==-->
                <div class="product-item">
                  <div class="inner-content">
                    <div class="product-thumb">
                      <a href="{{route('viewProperty',$product->id)}}">
                        <img src="{{asset('/storage/property/'.$product->image)}}" alt="Image-HasTech">
                        <img class="second-image" src="{{asset('/storage/property/'.$product->image)}}" alt="Image-HasTech">
                      </a>
                      <div class="product-action">
                        <div class="addto-wrap">
                          <a class="add-wishlist liked" title="Add to wishlist"  property="{{$product->id}}" value="1" name="like"  >
                            <i class="icon-heart icon" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                          </a>
                           
                        </div>
                      </div>
                      
                    </div>
                    <div class="product-desc">
                      <div class="product-info">
                        <h4 class="title"><a href="{{route('viewProperty',$product->id)}}">                         
                        @if($product->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$product->name}}
                          @else
                          {{$product->name_en}}
                          @endif @else
                          {{$product->name}}
                          @endif</a></h4>
                         
                        <div class="prices">
                          <!-- <span class="price-old visually-hidden">{{$product->price}} {{__('AED')}} </span> -->
                          <span class="price text-black">{{$product->price}} {{__('AED')}}</span>
                        </div>
                      </div>
                      <div class="product-footer">
                        <a class="btn-product-add add_cart" product_id="{{$product->id}}" href="{{route('viewProperty',$product->id)}}">{{__('Add to cart')}}</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--== End Shop Item ==-->
              </div>
              @endforeach
            
          </div>
        </div>
      </div>
       
    </section>
    <!--== End Product Area Wrapper ==-->

     <!--== Start Product Category Area Wrapper ==-->
     <section class="product-area product-category-area">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">{{__('Shop by category')}}</h2>
            
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-categorys-col5-slider owl-carousel owl-theme">
            @foreach($categores as $ca)
              <div class="item" >
                <div class="product-category-item">
                  <div class="inner-content" >
                    <div class="thumb">
                    @if($ca->img)
                      <img src="{{asset('/storage/property/'.$ca->img)}}" alt="{{$ca->name}}" class="img" >
                      @endif
                    </div>
                    <div class="content">
                      <!-- <p class="product-number">13 products</p> -->
                      <h4 class="title"><a href="{{route('category_property',$ca->id)}}">@if($ca->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$ca->name}}
                          @else
                          {{$ca->name_en}}
                          @endif @else
                          {{$ca->name}}
                          @endif</a></h4>
                    </div>
                  </div>
                </div>
              </div>
               @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Category Area Wrapper ==--> 
 

@stop

@push('js') 

  <script>
$('.liked').click(function(anyothername) {
              //  e.preventDefault();
               
         var id = $(this).attr('property');
         var val = $(this).val();
         
         $.ajax({
                type: "post",
                url: "{{ route('property.like') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id 
                      },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                         
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
$('.add_cart').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('product_id');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('cart.store') }}",
                data: { _token: '{{ csrf_token() }}',
                     "product_id" : id,
                     "quantity" : 1},
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                      flashBox('success', '{{__('Added to cart')}}');
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
</script>
@endpush
 