@extends('layouts.layoutSite.SitePage')
 @section('content')

 <div class="page-header-area bg-img" data-bg-img="{{asset('/assets/img/photos/bgpa.jpg')}}">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="page-header-content">
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="{{route('viewHomePage')}}">{{__('Home')}}</a></li>
                  <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                   <li>@if($product->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$product->name}}
                          @else
                          {{$product->name_en}}
                          @endif @else
                          {{$product->name}}
                          @endif</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==--> <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
      <div class="container pt-60 pb-0">
        <div class="row">
          <div class="col-12">
            <div class="product-single-item" data-margin-bottom="62">
              <div class="row">
                <div class="col-md-6">
                  <!--== Start Product Thumbnail Area ==-->
                  <div class="product-thumb">
                    <div class="swiper-container single-product-thumb-content single-product-thumb-slider2">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide zoom zoom-hover">
                          <a class="lightbox-image" data-fancybox="gallery" href="{{asset('/storage/property/'.$product->image)}}">
                            <img src="{{asset('/storage/property/'.$product->image)}}" alt="Image-HasTech">
                           </a>
                        </div>   
                         @foreach($product->album as $a)  
                        <div class="swiper-slide zoom zoom-hover">
                          <a class="lightbox-image" data-fancybox="gallery" href="{{asset('/storage/property/'.$a->name)}}">
                            <img src="{{asset('/storage/property/'.$a->name)}}" alt="Image-HasTech">
                           </a>
                        </div> 
                        @endforeach
                      </div>
                    </div>
                    <div class="swiper-container single-product-nav-content single-product-nav-slider2">

                      <div class="swiper-wrapper">
                      <div class="swiper-slide">
                          <img src="{{asset('/storage/property/'.$product->image)}}" alt="Image-HasTech">
                        </div>
                      @foreach($product->album as $a) 
                        <div class="swiper-slide">
                          <img src="{{asset('/storage/property/'.$a->name)}}" alt="Image-HasTech">
                        </div>
                        @endforeach
                        
                      </div>
                    </div>
                  </div>
                  <!--== End Product Thumbnail Area ==-->
                </div>
                <div class="col-md-6">
                  <!--== Start Product Info Area ==-->
                  <div class="product-single-info mt-sm-70">
                    <h1 class="title"> @if($product->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$product->name}}
                          @else
                          {{$product->name_en}}
                          @endif @else
                          {{$product->name}}
                          @endif</h1>
                    <div class="product-info">
                       
                       
                    </div>
                    <div class="prices">
                    <h5><sapn>{{$product->price}}</sapn> {{__('AED')}}</h5>
                     </div>
                    <div class="product-description">
                      <ul class="product-desc-list">
                        <li> 
                        @if($product->description_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$product->description}}
                          @else
                          {{$product->description_en}}
                          @endif @else
                          {{$product->description}}
                          @endif </li>
                         
                      </ul>
                    </div>
                    <div class="product-quick-action">
                      
                        <form action="{{ route('cart.store') }}" method="post" id="myform">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="div-add-to-cart d-flex align-items-center">

                        <div class="product-quick-qty">
                        <div class="pro-qty">
                        <input type="text" id="quantity" name="quantity" title="Quantity" value="1">
                        </div>
                        </div>

                        <a class="btn-product-add add_cart" href="#" onclick="document.getElementById('myform').submit()" > {{__('Add to cart')}}</a>
                        </div>
                        </form>
                     </div>
                    <div class="product-wishlist-compare">

                      <a class="btn-wishlist liked" title="Add to wishlist"  property="{{$product->id}}" value="1" name="like"  >
                            <i class="icon-heart icon" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   > {{__('Add to favorite')}}</i>
                      </a> 
                    </div>
                     <br>
                        <ul class="more-details">
                        @if($product->sku) <li><span>SKU</span> : <span>{{$product->sku}}</span></li>@endif
                        @if($product->code)  <li><span>  {{__('Item code')}}</span> : <span>{{$product->code}}</span></li>@endif
                        @if($product->guarantee)<li><span> {{__('Guarantee')}}</span> : <span>{{$product->guarantee}}</span></li>@endif
                        <!--<li><span>سومو</span> :<span> </span></li>-->
                        <li> @if($product->category)<span> {{__('Category')}}
                             @if($product->category->name_en != null)
                          @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                          {{$product->category->name}}
                          @else
                          {{$product->category->name_en}}
                          @endif @else
                          {{$product->category->name}}
                          @endif</span> : @endif<span> {{$product->name}} </span></li>
                         </ul>
                    <div class="social-sharing">
                      <span>{{__('Sharing')}}</span>
                      <div class="social-icons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/property/{{$product->id}}&display=popup" target="_blank" class="bi bi-facebook"><i class="la la-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ url('/') }}/property/{{$product->id}}" target="_blank"  ><i class="la la-twitter"></i></a>
                       </div>
                    </div>
                  </div>
                  <!--== End Product Info Area ==-->
                </div>
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </section>
   <!--== Start Product Area Wrapper ==-->
   <section class="product-area">
      <div class="container pt-95 pt-lg-70">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">{{__('Linked products')}}</h2>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="product-slider owl-carousel owl-theme">
            @foreach($products as $product)
              <div class="item">
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
                        <h4 class="title"><a href="{{route('viewProperty',$product->id)}}">@if($product->name_en != null)
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
      </div>
       
    </section>
    <!--== End Product Area Wrapper ==-->
<!--</section>-->
<!--<div class="modal" id="add-to-cart-modal" tabindex="-2" aria-labelledby="add-to-cart-modal" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered modal-lg">-->
<!--      <div class="modal-content">-->
<!--          <button type="button" class="btn btn-close-it border-0 bi bi-x-circle float-start" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--        <div class="modal-body">-->
<!--<div class="row py-4">-->
<!--    <div class="col-6 text-center vl">-->
<!--        <p class="text-center d-flex align-items-center justify-content-center">-->
<!--<span class="bi bi-check"></span>-->
<!--            تم ارسال الكمية بنجاح-->
<!--        </p>-->
<!--        <img src="{{asset('/storage/property/'.$product->image)}}" alt="panel image">-->
        <!--<img src="images/panels04.png" class="my-2" width="50%" height="auto" alt="panel image">-->
<!--        <ul class="more-details">-->
<!--            <li><span>  {{$product->name}}</li>-->
            <!--<li><span>الكمية</span> : <span>1</span></li>-->
<!--            <li><span>المجموع</span> : <span>   {{$product->price}}</span>د.ك</li>   -->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="col-6 text-center">-->
<!--        <p>-->
<!--            يوجد-->
<!--            <span> 3</span>-->
<!--             عنصر في سلة التسوق الخاصة بك-->
<!--        </p>-->
<!--        <p>-->
<!--            <span>المجموع</span> : <span>30</span>د.ك-->
<!--        </p>-->
<!--        <button class="btn btn-outline-primary w-100 my-2">عرض سلة المشتريات</button>-->
<!--        <button class="btn btn-primary w-100 my-2">المتابعة لإتمام الشراء</button>-->
<!--    </div>-->
<!--</div>-->
            
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->

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
</script>
@endpush

