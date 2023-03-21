@extends('layouts.layoutSite.SitePage')
@section('title','تسجيل الدخول')
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
                  <li>{{__('Sign In')}}</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- end breadcrumb -->


<section class="container section-creat-account">
    <div class="row">
        <p class="h4 text-center">{{__('Sign In')}}</p>
        <div class="col-md-4 m-auto my-5">
        <form method="POST" action="{{route('login')}}" class="ltn__form-box contact-form-box">
                            @csrf

            <div class="mb-3">
                <label for="user-name-or-email" class="form-label"> {{__('Email')}}</label>
                
                @error('email')
                            <small class="form-text text-danger">{{__('The password or email does not match our records.')}} </small>
                            @enderror
                <input type="text" name="email" value="{{old('email')}}" class="form-control" id="user-name-or-email" >
              </div>
         
          <div class="mb-3">
            <label for="user-password" class="form-label">{{__('Password')}}</label>
            <div class="input-group">
                 @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="password" name="password" class="form-control" aria-label="user-password" aria-describedby="user-password">
            </div>
            <input type="submit" class="btn btn-warning w-100 btn-create-acount my-4 text-light" value="  {{__('Sign In')}} ">
             <div class="text-center"><p class="h6 pb-10"> {{__('or')}} </p></div>
            <div class="text-center">
            <a href="{{route('register')}}" class="h5"> {{__('Register')}}</a>
             
                </div>
            
          </div>
</form>
        </div>
    </div>
</section>

@stop

 

