@extends('layouts.layoutSite.SitePage')

 @section('content')

<!-- start breadcrumb -->
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
                  <li>{{__('My account')}}</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- end breadcrumb -->
@if ($errors->any())
    <div class="alert alert-danger col-md-4">
        {{__('Verify the information entered')}}
    </div>
@endif
<!-- start tab -->
<section class="container pt-30 pb-30 section-tab-downloads">
    <div class="row">
        <div class="col-md-3 ps-0 pe-lg-4">
            <div class="nav flex-md-column nav-pills me-md-3 p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               
                <button class="nav-link flex-fill active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"> {{__('Control Board')}}</button>
                <button class="nav-link flex-fill" id="v-pills-request-tab" data-bs-toggle="pill" data-bs-target="#v-pills-request" type="button" role="tab" aria-controls="v-pills-request" aria-selected="false"> {{__('Requests')}}</button>
                <button class="nav-link flex-fill " id="v-pills-downloads-tab" data-bs-toggle="pill" data-bs-target="#v-pills-downloads" type="button" role="tab" aria-controls="v-pills-downloads" aria-selected="false"> {{__('Addresses')}}</button>
                <button class="nav-link flex-fill" id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address" aria-selected="false"> {{__('Add an address')}}</button>
                <button class="nav-link flex-fill" id="v-pills-details-tab" data-bs-toggle="pill" data-bs-target="#v-pills-details" type="button" role="tab" aria-controls="v-pills-details" aria-selected="false"> {{__('Account details')}}</button>
               
                <form method="POST" action="{{ route('logout') }}" class="mr-70 ml-70" >
                          @csrf
                      <button href="{{route('logout')}}" class="nav-link pr-40 pl-40"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                        {{__('Sign Out')}} </button></div>
                      </form> 
             
        </div>
        <div class="col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane pt-40 fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                <strong> {{__('Hello!')}} <strong> {{\Illuminate\Support\Facades\Auth::user()->fname}}</strong>  </strong><br>
                   <strong>   {{__('From your account dashboard, you can view and manage your recent orders, shipping and billing addresses, and edit your password and account details.')}} </strong>
                                           
                </div>
                <div class="tab-pane pt-5 fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab" tabindex="0"> 
                     <div class="table-responsive section-table ">
                    <table class="table border ">
                        <thead>
                          <tr>
                            <th scope="col"> {{__('Order number')}}</th>
                            <th scope="col"> {{__('Total')}}</th>
                            <th scope="col"> {{__('Quantity')}} </th>
                            <th scope="col"> {{__('Status')}} </th>
                            <th scope="col"> {{__('Cancel order')}}</th>
                            <th scope="col"> {{__('Payment status')}}</th>
                            <th scope="col"> {{__('View')}}</th>
                             
                          </tr>
                        </thead>
                        <tbody>
                            @foreach(\Illuminate\Support\Facades\Auth::user()->orders as $order)
                          <tr class="R_order{{$order->id}}">
                          <th scope="row">{{$order->id}}</th>
                          <td>  {{$order->total}}  {{__('AED')}}</td>
                          <td>    {{$order->items->count()}} </td>
                            
                            <th > @if($order->status == 0) {{__('Rejected')}}@endif @if($order->status == 1) {{__('Requested')}} @endif @if($order->status == 2)  {{__('is shipped')}} @endif @if($order->status == 3) {{__('Delivered')}} @endif </th>
                            <th> @if($order->payment_method == "cash") @if($order->status == 1)<a href="" class="deletem_order" deletem_order="{{$order->id}}" > {{__('cancel')}}</a>@endif @endif</th>
                            <td>    @if($order->payment_method == "cash")
                                    الدفع عند الاستلام
                                    @else
                                    بطاقة ائتمان
                                    @if($order->payment )
                                    @if($order->payment->status == 'pending' )                                                                              
                                    <span class="badge bg-primary"> في انتظار الدفع</span>
                                    @elseif($order->payment->status == 'completed')
                                    <span class="badge bg-success">  تم الدفع</span>
                                    @elseif($order->payment->status == 'failed')
                                    <span class="badge bg-danger"> تم الغاء الدفع</span>
                                    @else
                                    <span class="badge bg-danger"> فشل الدفع</span>
                                    @endif
                                    @endif  @endif </td>
                            <th ><a href="showorder/{{$order->id}}" > {{__('show')}}</a> </th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    

                </div></div>
                <div class="tab-pane pt-5 fade " id="v-pills-downloads" role="tabpanel" aria-labelledby="v-pills-downloads-tab" tabindex="0">
                    <div class="table-responsive section-table  ">
                    <table class="table border ">
                        <thead>
                          <tr>
                            <th scope="col"> {{__('Name')}} </th>
                            <th scope="col">   {{__('Email')}} </th>
                            <th scope="col">   {{__('Region')}}</th>
                            <th scope="col"> {{__('Street')}}</th>
                            <th scope="col"> {{__('Mobile number')}}</th>
                            <th scope="col"> {{__('Apartment/House')}} </th>
                            <th scope="col">  {{__('Blvd')}} </th>
                            <th scope="col">  {{__('delete')}} </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)
                          <tr class="R_address{{$address->id}}">
                          <th scope="row">{{$address->name}}</th>
                            <td>{{$address->email}}</td>
                            <td >{{$address->area}}</td>
                            <th >{{$address->street}}</th>
                            <td>{{$address->phone}}</td>
                            <td>{{$address->house}}</td>
                            <td>{{$address->Blvd}}</td>
                            <td><a href="" class="deletem_b" deletem_b="{{$address->id}}" >{{__('delete')}}</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab" tabindex="0">
                    
<section class="container ">
    <div class="row">
        <p class="h6">  {{__('The following addresses will be used on the checkout page by default')}}</p><br>
        <div class="col-md-6">
        <form method="POST" action="{{ route('user.location.save') }}"  >
                            @csrf
                            <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Name')}}</label></p> 
                @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="name"  value="{{old('name')}}" placeholder="{{__('Name')}} " maxlength="100" required>
              </div><br>
      <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Email')}}</label></p> 
                @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="email"  value="{{old('email')}}" placeholder="{{__('Email')}}" maxlength="100" required>
              </div><br>
         <div class="pb-8">
            <p style="color:red">* <label style="color:black" >  {{__('Region')}} </label></p> 
                @error('area')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <select class="form-control"  name="area">
                                                     
                                                     @if( old('area') )
                                                     <option value="{{old('area')}}" selected>{{old('area')}}</option>@endif
                                                     <option value=""> {{__('Choose the region')}} </option>
                                                     @foreach($cities as $ca)
                                                     <option value="{{$ca->name}}"> {{$ca->name}}</option>
                                                     @endforeach
                                                 </select>               </div><br>
              <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Street')}} </label></p> 
                @error('street')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="street"  value="{{old('street')}}" placeholder=" {{__('Street')}}   " maxlength="100" required>
              </div><br>
              <div class="pb-8">
             <label style="color:black" >  {{__('Add an address')}} </label><br>
          
                <input type="text" class="form-control" name="Blvd"  value="{{old('Blvd')}}" placeholder=" {{__('Blvd')}}   " maxlength="100"  ><br>
              </div><br>
              <div class="pb-8">
            <label style="color:black" > {{__('Apartment/House')}}  </label> 
               
                <input type="text" class="form-control" name="house"  value="{{old('house')}}" placeholder=" {{__('Apartment/House')}}   " maxlength="100" >
              </div><br>
        <div class="pb-8">
        <p style="color:red">* <label style="color:black" >  {{__('Mobile number')}} </label></p> 
            @error('phone')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="{{__('Mobile number')}} " maxlength="100" required >
          </div>
          <input type="submit" class="btn btn-warning w-100 btn-create-acount my-4 text-light" value=" {{__('Add an address')}}  ">

</form>
               
         
        </div>
    </div>
</section>
                </div>
                <div class="tab-pane fade" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab" tabindex="0">
                <section class="container section-creat-account">
               <div class="row">
                  <p class="h6"> {{__('The following addresses will be used on the checkout page by default')}}  </p>
                  <br>
                  <div class="col-md-6">
                     <div id="success_message_security"></div>
                     <form  name="learner_security" id="learner_security" enctype="multipart/form-data" method="post" action="">
                        @csrf
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('First name')}}</label></p>
                           @error('fname')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control" name="fname"  value="{{Auth::user()->fname}}" placeholder=" {{__('First name')}} " maxlength="100" required>
                        </div>
                        <br>
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('Second name')}}</label></p>
                           @error('lname')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control"  name="lname"  value="{{Auth::user()->lname}}" placeholder=" {{__('Second name')}} " maxlength="100" required>
                        </div>
                        <br>
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('Email')}}</label></p>
                           @error('email')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control" name="email"   value="@if(Auth::user()->email) {{ Auth::user()->email }} @endif" placeholder=" {{__('Email')}}" maxlength="100" required>
                        </div>
                        <br> 
                        <label for="user-password" class="form-label"> {{__('Change Password')}} </label>
                        <div class="input-group">
                           @error('old_password')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                            <input type="password" class="form-control" class="form-control" name="old_password" aria-label="user-password" aria-describedby="user-password" placeholder="{{__('Old Password')}} ">
                        </div>
                        <br>
                        <div class="input-group">
                           @error('new_password')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                            <input type="password" class="form-control" class="form-control" name="new_password" aria-label="user-password" aria-describedby="user-password" placeholder=" {{__('New password')}} ">
                        </div>
                        <br>
                        <div class="mb-3">
                           <div class="input-group">
                              @error('password_confirmation')
                              <small class="form-text text-danger">{{$message}}</small>
                              @enderror
                               <input type="password" class="form-control" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password" placeholder=" {{__('Confirm password')}} ">
                           </div>
                        </div>
                        <button id="learner_security_btn" class="btn btn-warning w-100 btn-create-acount my-4 text-light"> {{__('Save changes')}}  </button>

                   </div>
                  </form>
               </div>
         </div>
      </div>
      </section>
                </div>
              </div>
        </div>
</div>
</section>
<!-- end tab -->
@stop

@push('js')

<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 
<script>
$('.deletem_b').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('deletem_b');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_address') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_address"+ data.id).remove();
                        flashBox('success', ' تم الحذف');

                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    

    $('.deletem_order').on("click", function (e) {
            e.preventDefault();
            
        if (confirm("هل انت متأكد من الغاء الطلب") == true) {

         var id = $(this).attr('deletem_order');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_order') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_order"+ data.id).remove();
                        flashBox('success', ' تم الحذف');

                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
              }
    });


$('#learner_security_btn').on('click' , function (e) {
            e.preventDefault();
            $(document).find('#err').remove();
            $.ajax({
                type: "post",
                url: "{{ route('user.settings_security.save') }}",
                data: $("#learner_security").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    flashBox('success', 'تم تحديث البيانات');

                     
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message_security').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible"> تأكد من البيانات المدخلة</div>');
                        document.body.scrollTop = document.documentElement.scrollTop = 0;

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            //el.nextAll().remove();
                            el.after($(' <div id="err" class="input-group"><span  style="color: red;">' + error[0] + '</span> </div>'));
                        });
                    }
                }
            });

        });



 </script>
@endpush
