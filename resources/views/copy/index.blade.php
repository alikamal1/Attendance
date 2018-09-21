
@extends('layouts.app')

@section('content')

<div class="card-deck mb-3 text-center " style="direction: rtl;">
    <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">نسخ قوائم الطلاب</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/student.png')}}" alt="">
    <hr>
    <a href="{{route('copy.studentindex')}}" class="btn btn-lg btn-block btn-primary"> نسخ الطلاب </a>
    </div>
  </div>
    
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">نسخ المواد الدراسية</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/subjects.png')}}" alt="">
    <hr>
    <a href="{{route('copy.subjectindex')}}" class="btn btn-lg btn-block btn-primary"> نسخ المواد</a>
    </div>
  </div>

  
</div>


@endsection
