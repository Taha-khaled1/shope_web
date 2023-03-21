@extends('layouts.layoutSite.SitePage')
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
                  <li>{{__('Common questions')}}</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> 
<!-- end breadcrumb -->

<!-- start boards -->
<section  >
<div class="container pr-60 pl-60">
    <div class="row">
        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        {!!$data!!}
        @else
        {!!$data_en!!}
        @endif
            
 
</div>
</div>
</section>

@stop

@section('script')

<script src="{{asset('SitePage/js/plugins.js ')}}"></script>
<script src="{{asset('SitePage/js/main.js')}}"></script>

@stop

