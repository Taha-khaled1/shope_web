@extends('layouts.layoutSite.SitePage')
 

@section('content')
 <!-- start breadcrumb -->
 
<!-- end breadcrumb --> <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
          <div class="row">
            <div class="col-lg-8">
              <div class="shopping-cart-content">
                <h4 class="title">{{__('Shopping cart')}}</h4>
                @if($cart->get()->count()== 0 ) <h1>{{__('The cart is empty')}}</h1><br><a href="{{route('viewHomePage')}}">{{__('Home')}}</a>   @else
                 @foreach($cart->get() as $item)
                <div class="shopping-cart-item" id="a{{$item->id }}" >
                  <div class="row">
                    <div class="col-4 col-md-3">
                      <div class="product-thumb">
                       <a href="{{route('viewProperty',$item->product->id)}}">
                        <img src="{{asset('/storage/property/'.$item->product->image)}}" alt="Has-Image">
                       </a>
                      </div>
                    </div>
                    <div class="col-8 col-md-4">
                      <div class="product-content">
                        <h5 class="title"><a href="single-product.html">{{ $item->name }}</a></h5>
                          
                      </div>
                    </div>
                    <div class="col-6 offset-4 offset-md-0 col-md-5">
                      <div class="product-info">
                        <div class="row">
                          <div class="col-md-10 col-xs-6">
                            <div class="row">
                              <div class="col-md-6 col-xs-6 qty">
                                <div class="product-quick-qty">
                                  <div class="pro-qty">
                                    <input type="number" class="item-quantity" product_id="{{$item->product->id}}" dataa_id="{{ $item->id }}" dataa_total="{{ $item->quantity * $item->product->price }}" dataa_price="{{ $item->product->price }}"  value="{{ $item->quantity }}">
                                  </div>
                                </div>
                              </div> 
                              <div class="col-md-6 col-xs-2 price">
                                <h6 class="product-price">{{ $item->product->price }}  {{__('AED')}}</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-2 text-end">
                            <div class="product-close"><a  class=" remove-item"   data_id="{{ $item->id }}"  href="javascript:void(0)"><i class="ion-md-trash"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
               
                <a class="btn-primary" href="{{route('cartempty')}}" onclick="confirm(' Are you sure to empty the cart! ');">{{__('Empty the cart')}}</a>
                @endif
              </div>
            </div>
            <div class="col-lg-4">
              <div class="shopping-cart-summary pt-10 pb-10 pr-10">
             
              
<form action="{{route('indexorder')}}" method="GET" >
   @csrf
@if(Auth::user())
<div class="form-group row">
<h6 class="col-md-3" for="frm_country">{{__('Shipping')}}</h6>
<div class="col-md-8">
<select id="frm_country" name="address_id" class="form-select form-control" >
<option value="" selected> {{__('Choose the region')}}</option>

@foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)

<option value="{{$address->id}}" selected>{{$address->name}} / {{$address->area}}</option>

@endforeach
</select>
</div>
</div>
 
    @endif<hr>
    <div class="d-flex ">
        <h6> {{__('Total summation')}} : &nbsp;</h6>
        <div id="totalq">
            <span  id="totals"> {{$cart->total()}}</span>
            {{__('AED')}}
        </div>
    </div><hr>
    

    <div class="text-center ">
<button class="btn btn-primary" type="submit">{{__('Continue to complete the purchase')}} </button></div>
</form>
              </div>
               
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->

@stop

@push('js')  
<script>   
     
   $('.remove-item').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('data_id');
         
         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "delete",
                data: { _token: '{{ csrf_token() }}'
                     },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $("#a"+ id).remove();
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totala +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totala +'</span> {{__('AED')}}' );
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
    $('.item-quantity').on("change", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('dataa_id');
         var product_id = $(this).attr('product_id');
         var total = $(this).attr('dataa_total') + $(this).attr('dataa_price');
         

         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "put",
                data: { _token: '{{ csrf_token() }}',
                quantity: $(this).val(),
                product_id: product_id,
                xx: 'x',
                     },
                               // let's set the expected response format
                    success: function (data) {
                        if(data.message == 1){
                              
                            flashBox('error', 'نفذت الكمية');


                        }else{
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );
                   
                        }
 
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    </script>
    
    @endpush

