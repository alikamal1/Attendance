
@extends('layouts.app')

@section('content')

<div class="card-deck mb-3 text-center " style="direction: rtl;">
    <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">التقارير الرئيسية الكاملة</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/full.png')}}" alt="">
    <hr>
    <a href="{{route('report.index')}}" class="btn btn-lg btn-block btn-primary"> قوائم الغيابات </a>
    </div>
  </div>
    
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">تقارير حسب المواد</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/subject_report.png')}}" alt="">
    <hr>
    <a href="{{route('report.index_subject_based')}}" class="btn btn-lg btn-block btn-primary"> قوائم الغياب المادة</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">تقارير حسب الطالب</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/profile.png')}}" alt="">
    <hr>
    <a href="{{route('report.index_student_based')}}" class="btn btn-lg btn-block btn-primary">قوائم الغياب الطالب</a>
    </div>
  </div>
  
</div>


@endsection
