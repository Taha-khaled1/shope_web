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
                  <li>{{__('Create an account')}}</li>
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
        <p class="h4 text-center"> {{__('Create an account')}}</p>
        <div class="col-md-4 m-auto my-5">
        <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box">
                            @csrf

            <div class="mb-3">
                <label for="user-name-or-email" class="form-label">  {{__('Email')}} </label>
                @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            @if (\Session::has('error'))
                            <small class="form-text text-danger">
                                {{ \Session::get('error')}}
                            </small>
                            @endif
                <input type="text" name="email" class="form-control" id="user-name-or-email"  value="{{old('email')}}" >
              </div>
        
        <div class="mb-3">
            <label for="user-mobile" class="form-label"> {{__('Mobile number')}}</label>
            @error('phone')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            <input type="text" name="phone"  class="form-control" id="user-mobile"  value="{{old('phone')}}">
          </div>
          <div class="mb-3">
            <label for="user-password" class="form-label"> {{__('Password')}}</label>
            <div class="input-group">
            @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                 <input type="password" class="form-control" name="password" aria-label="user-password" aria-describedby="user-password">
            </div><br>
            <div class="mb-3">
            <label for="user-password" class="form-label"> {{__('Confirm password')}}</label>
            <div class="input-group">
            @error('password_confirmation')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                 <input type="password" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password">
            </div></div>
</form>
            <input type="submit" class="btn btn-warning w-100 btn-create-acount my-4 text-light" value="{{__('Create an account')}} ">
            <div class="text-center"><p class="h6 pb-10"> {{__('or')}} </p></div>            <div class="text-center">
            <a href="{{route('login')}}" class="h6 d-block"> {{__('Return to the login page')}}</a>
            <p>  {{__('By registering to create an account I accept the Terms and Conditions')}}</p>
                </div>
            
          </div>
        </div>
    </div>
</section>

@stop

 

