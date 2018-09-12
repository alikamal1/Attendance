@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>اضافة اسم تدريسي جديد</b>
        </div>
        <div class="card-body">
         <form action="{{route('teacher.store')}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <label for="username" style="float: right;">الاسم</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="password" style="float: right;">كلمة المرور</label>
                <input type="text" name="password" class="form-control" value="">
            </div>
            
			<button class="btn btn-success btn-block" type="submit">حفظ اسم التدريسي الجديد</button>
        </form> 
        
        </div>
    </div>

@endsection

