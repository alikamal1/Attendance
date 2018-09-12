@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>تعديل معلومات التدريسي</b>
        </div>
        <div class="card-body">
         <form action="{{route('teacher.update',$teacher->id)}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="username" style="float: right;">الاسم</label>
                <input type="text" name="username" class="form-control" value="{{$teacher->username}}">
            </div>
            <div class="form-group">
                <label for="password" style="float: right;">كلمة المرور</label>
                <input type="text" name="password" class="form-control" value="">
            </div>

            <button class="btn btn-success btn-block" type="submit">حفظ معلومات التدريسي الجديدة</button>
        </form> 
        
        </div>
    </div>

@endsection

