@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>تعديل معلومات المادة</b>
        </div>
        <div class="card-body">
         <form action="{{route('subject.update',$subject->id)}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group">
                <input hidden type="text" name="level_id" class="form-control" value="{{$subject->level_id}}">

                <label for="name" style="float: right;">الاسم</label>
                <input type="text" name="name" value="{{$subject->name}}" class="form-control" value="">
            </div>
            <div class="form-group">   
                <label style="float: right;">عدد الساعات</label>
                <select class="form-control" name="hours">
                    @foreach($hours as $hour)
                    <option  value="{{$hour->value}}" {{ $hour->value == $subject->hours ? "selected":"" }}>{{$hour->value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">نوع المادة</label>
                <select class="form-control" name="subject_type">
                    @foreach($subject_types as $subject_type)
                    <option  value="{{$subject_type->value}}" {{ $subject_type->value == $subject->subject_type ? "selected":"" }}>{{$subject_type->value}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" hidden name="year" class="form-control" value="{{$year}}">
                    <button class="btn btn-success btn-block" type="submit">حفظ اسم الطالب الجديد</button>
        </form> 
        
        </div>
    </div>

@endsection

