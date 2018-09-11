@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <b>اضافة اسم طالب جديد</b>
        </div>
        <div class="card-body">
         <form action="{{route('student.store')}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <input hidden type="text" name="level_id" class="form-control" value="{{$level->id}}">

                <label for="name" style="float: right;">الاسم</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
                    <button class="btn btn-success btn-block" type="submit">حفظ اسم الطالب الجديد</button>
        </form> 
        
        </div>
    </div>

@endsection

