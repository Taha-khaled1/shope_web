@extends('layouts.layoutSite.SitePage')
 

@section('content')
<!-- start breadcrumb -->

 
<!-- end breadcrumb -->
<section class="container py-3 section-continue">
    <div class="row">


      <div id="whatsapp-button">
        <a href="https://wa.link/pl0i9v" target="_blank">
          <img src="99425-whatsapp.gif" alt="WhatsApp" width="150" height="150">
          <span class="message">لقد دفعت الفاتوره الاستلام الان</span>
        </a>
      </div>
              

        <div class="col-md-6 payment-details">
            <p class="h4"> 
            {{__('Payment details')}}  
             </p>
            <br>
            <form action="{{route('storeorder')}}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="full-name" class="form-label"> {{__('Full Name')}}</label>
                    @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="name" class="form-control" id="full-name" value="@if($add == 1) {{$address->name}} @else {{old('name')}} @endif" maxlength="100" required>
                  </div>
                  <div class="mb-3">
                    <label for="email-address" class="form-label"> {{__('Email')}}</label>
                    @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="email" name="email" class="form-control" id="email-address" value="@if($add == 1) {{$address->email}} @else {{old('email')}}  @endif" maxlength="100" required>
                  </div>
                  <div class="my-3">
                    <label for="choose-region" class="form-label"> {{__('المنطقة')}}</label>
                    @error('area')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                  <select name="area" class="form-select form-control" id="choose-region" aria-label="Default select example" maxlength="100" required >
                  <option value=""> {{__('Choose the region')}}</option>  
                  <option selected value="@if($add == 1) {{$address->area}} @else {{old('area')}} @endif">    @if($add == 1) {{$address->area}} @else {{old('area')}}  @endif </option>
                    @foreach($cities as $ca)
                    <option value="{{$ca->name}}"> {{$ca->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="street"  class="form-label"> {{__('Street')}}</label>
                    @error('street')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="street" class="form-control" id="street" placeholder="أدخل اسم الشارع" value="@if($add == 1) {{$address->street}} @else {{old('street')}} @endif" maxlength="100"   >
                  </div>
                  <div class="mb-3">
                    <label for="District" class="form-label"> {{__('Blvd')}}</label>
                    <input type="text" name="Blve" class="form-control" id="أدخل رقم الجادة" value="@if($add == 1) {{$address->Blve}} @else {{old('Blve')}}  @endif">
                  </div>
                  <div class="mb-3">
                    <label for="flat" class="form-label"> {{__('Apartment/House')}}</label>
                    <input type="text" name="house" class="form-control" id="flat" placeholder="أدخل رقم/اسم الشقة/المنزل" value="@if($add == 1) {{$address->house}} @else {{old('house')}}  @endif" maxlength="100"  >
                  </div>
                  <div class="mb-3">
                    <label for="mobile-number" class="form-label"> {{__('Mobile number')}}</label>
                    @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="phone" class="form-control" id="mobile-number" value="@if($add == 1) {{$address->phone}} @else {{old('phone')}}  @endif" maxlength="100" required>
                  </div> 
                   @if(Auth::user())@else
                  <div class="mb-1 ">
                    <input class="form-check-input" type="checkbox" value="1" name="make_user"  id="accept">
                    <label class="form-check-label" for="accept">
                       {{__('Create an account')}}
                     </label>
                  </div>
                  <div class="mb-3">
                  <label for="user-password" class="form-label"> {{__('Password')}}</label>
                      @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <div class="input-group">
                         <input type="password" class="form-control" name="password" aria-label="user-password" aria-describedby="user-password">
                    </div></div>
                  <div class="mb-3">
                  <label for="user-password" class="form-label"> {{__('Confirm password')}}</label>
                     @error('password_confirmation')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-group">
                     <input type="password" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password">
                    </div></div>
                    @endif
                  <div class="mb-3">
                    <label for="add-nots" class="form-label"> {{__('Notes with the order')}}</label>
                    <textarea class="form-control" name="nots" id="add-nots" cols="10" maxlength="300"  rows="5"></textarea>
                  </div>

                  <div class="mb-1  ">
                    <input class="form-check-input" type="checkbox" value="" id="accept-terms"  required >
                    <label class="form-check-label" for="accept-terms">
                             {{__('I agree to the terms and conditions')}}
                    </label>
                  </div>
           
        </div>
        <div class="col-md-5 do-you-have-discount-code pl-50 pr-50">
      
            
            <div class="cart-sum my-5">
                <p class="h5 my-3 text-center" >{{__('Shopping cart')}}</p>
                @foreach($cart->get() as $item)

                <div class="d-flex product-in-cart align-items-center">
                    <div class="item product-in-cart-image ">
                  <a href="{{route('viewProperty',$item->product->id)}}">
                  <img src="{{asset('/storage/property/'.$item->product->image)}}" alt="image for product" width="100"></a>                    </div>
                    <div class="item product-in-cart-title flex-fill text-start">
                    <p> {{ $item->product->name }}</p>
                    </div> 
                        </div>
                        
               @endforeach
               <hr>
                <div class="d-flex justify-content-between mt-5">
                    <span> {{__('Partial total')}}</span>
                    <div>
                        <span>  {{$cart->total()}}    </span>
                        {{__('AED')}}
                    </div>
                </div>
                <hr>
                @if(isset($rate))
                <div class="d-flex justify-content-between">
                    <span>{{__('Discount')}}</span>
                    <div>
                        <span>{{$cart->total() * $rate}}</span>
                        {{__('AED')}}
                    </div>
                </div> <hr>
                @endif
                
                <div class="d-flex justify-content-between">
                    <span>{{__('Shipping')}}</span>
                    <div>
                        <span>8</span>
                        {{__('AED')}}
                    </div>
                </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span> {{__('Total summation')}}</span>
                        <bold>
                            <span>@if(isset($rate)) {{$cart->total() - ($cart->total() * $rate) + 8}} @else  {{$cart->total() + 8}}  @endif</span>
 
                            {{__('AED')}}
                        </bold>
                    </div>
                    
                
                
                
                </div>
                
                <div class="mb-3 form-check">
                @error('payment_method')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input name="payment_method" class="form-check-input" type="radio" checked value="cash" id="buy-cash" >
                    <label class="form-check-label" for="buy-cash">
                        <img src="{{asset('images/cach.png')}}" width="auto" height="20px" alt="buy cash">
                             {{__('Cash on delivery')}}
                    </label>
                  </div>
                  
                  <input type="text" value="@if(isset($rate)) {{$cart->total() - ($cart->total() * $rate) + 8}} @else  {{$cart->total() + 8}}  @endif" name="total" style="display:none" >
                  <input type="text" value="@if(isset($rate)) {{$cart->total() * $rate}} @else 0 @endif" name="discount" style="display:none" >

                  <hr class="my-4 hr-blue">

                <input type="submit" class="btn btn-warning float-end submit-buying" value="طباعة الفاتوره للدفع">

        </div>
       </form>
        @if(isset($rate))@else
           <label class="form-check-label" for="input-discount-code">
          {{__('Do you have a discount code?')}}
            </label>
          
            <p class="h4">
                   {{__('Discount code')}}
            </p>
          
         
            <div class="d-flex mt-2">
            <form action="{{route('discount')}}" method="post">
            @csrf
                <input type="text" name="code" class="form-control input-discount-code me-2 ms-0" maxlength="100" required placeholder="{{__('Enter the discount code')}} " >
               <input type="text" name="address_id"  value="@if($add == 1) {{$address->id}} @else  @endif" maxlength="100"  style="display:none" >
                <br><button type="submit" class="btn btn-dark" > {{__('Use the code')}}</button>
                </form>
            </div>@endif
    </div>
</section>
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
                        $("#"+ data.id).remove();
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
         var total = $(this).attr('dataa_total') + $(this).attr('dataa_price');
         

         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "put",
                data: { _token: '{{ csrf_token() }}',
                quantity: $(this).val(),
                xx: 'x',
                     },
                               // let's set the expected response format
                    success: function (data) {
                         $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );
                   
 
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

