
@extends('layouts.app')

@section('content')

<div class="card-deck mb-3 text-center " style="direction: rtl;">
    <div class="card mb-6 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">تخصيص المواد للتدريسين</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/full.png')}}" alt="">
    <hr>
    <a href="{{route('teacher_subject.create')}}" class="btn btn-lg btn-block btn-primary"> تخصيصي المواد </a>
    </div>
  </div>
    
  <div class="card mb-6 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">  اعدادات التخصيص</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/edit.png')}}" alt="">
    <hr>
    <a href="{{route('teacher_subject.index')}}" class="btn btn-lg btn-block btn-primary"> تعديل التخصيص</a>
    </div>
  </div>
  
</div>


@endsection
