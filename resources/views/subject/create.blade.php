@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>اضافة مادة جديدة</b>
        </div>
        <div class="card-body">
         <form action="{{route('subject.store')}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <input hidden type="text" name="level_id" class="form-control" value="{{$level->id}}">

                <label for="name" style="float: right;">اسم المادة</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group">   
                <label style="float: right;">عدد الساعات</label>
                <select class="form-control" name="hours">
                    @foreach($hours as $hour)
                    <option  value="{{$hour->value}}">{{$hour->value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">نوع المادة</label>
                <select class="form-control" name="subject_type">
                    @foreach($subject_types as $subject_type)
                    <option  value="{{$subject_type->value}}">{{$subject_type->value}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" hidden name="year" value="{{$level->year}}">
                    <button class="btn btn-success btn-block" type="submit">حفظ المادة الجديدة الجديد</button>
        </form> 
        
        </div>
    </div>

@endsection

