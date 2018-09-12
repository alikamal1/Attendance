@extends('layouts.app')

@section('content')


<div class="card-deck mb-3 text-center " style="direction: rtl;">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">الغيابات</h4>
          </div>
          <div class="card-body">
          	<img src="{{asset('images/absent.png')}}" alt="">
          	<hr>
            <button type="button" class="btn btn-lg btn-block btn-primary">تسجيل الغياب</button>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">الاعدادات</h4>
          </div>
          <div class="card-body">
          	<img src="{{asset('images/setting.png')}}" alt="">
			<hr>
            <button type="button" class="btn btn-lg btn-block btn-primary">اعدادات النظام</button>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">التدريسين</h4>
          </div>
          <div class="card-body">
          	<img src="{{asset('images/profile.png')}}" alt="">
          	<hr>
          </head>
            <button type="button" class="btn btn-lg btn-block btn-primary">التدريسين</button>
          </div>
        </div>
      </div>


@endsection

