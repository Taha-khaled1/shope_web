@extends('layouts.layoutSite.SitePage')
@section('title','نتائج البحث')
@section('content')

<!--== Start Page Header Area Wrapper ==-->
<div class="page-header-area bg-img" data-bg-img="{{asset('/assets/img/photos/bgpa.jpg')}}">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="page-header-content">
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="{{route('viewHomePage')}}">{{__('Home')}}</a></li>
                  <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                  <li>{{__('Research results')}}</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container pt-20 pb-80">
        <div class="row">
        @if( $products->count() == 0 ) <h3 class="mb-30 text-center">    {{__('No results found.')}} </h3>@endif

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
              <nav class="pagination-nav">
              @if (isset($products) && $products->lastPage() > 1)
  <ul class="pagination justify-content-center">
    @php
      $interval = isset($interval) ? abs(intval($interval)) : 3 ;
      $from = $products->currentPage() - $interval;
      if($from < 1){
        $from = 1;
      }

      $to = $products->currentPage() + $interval;
      if($to > $products->lastPage()){
        $to = $products->lastPage();
      }
    @endphp
    <!-- first/previous -->
    @if($products->currentPage() > 1)
 
    <li class="page-item ">
      <a href="{{ $products->url(1) }}" class="page-link"   >
      <span >&laquo;</span>
      </a>
    </li> 
    <li class="page-item ">
      <a href="{{ $products->url($products->currentPage() - 1) }}"  class="page-link">
      <span >&lsaquo;</span>
      </a>
    </li>
    @endif
    <!-- links -->
    @for($i = $from; $i <= $to; $i++)
    @php
      $isCurrentPage = $products->currentPage() == $i;
    @endphp
    <li class="page-item {{ $isCurrentPage ? 'active ' : '' }}" aria-current="{{ $isCurrentPage ? 'page ' : '' }}">
      <a href="{{ !$isCurrentPage ? $products->url($i) : '#' }}" class="page-link">
      {{ $i }}
      </a>
    </li>
    @endfor
    <!-- next/last -->
    @if($products->currentPage() < $products->lastPage())
    <li class="page-item ">
      <a href="{{ $products->url($products->currentPage() + 1) }}" class="page-link" >
      <span >&rsaquo;</span>
      </a>
    </li>
    <li class="page-item ">
      <a href="{{ $products->url($products->lastpage()) }}" class="page-link">
      <span >&raquo;</span>
      </a>
    </li>
    @endif
  </ul>
@endif 
 </nav>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
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
                      flashBox('success', 'تمت الاضافة الى السلة');
                       
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

