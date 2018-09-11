@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <b>انشاء {{$setting_name}} جديدة</b>
        </div>
        <div class="card-body">
         <form action="{{route('setting.store')}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <input hidden type="text" name="name" class="form-control" value="{{$setting_name}}">

                <label for="name" style="float: right;">الاسم</label>
                <input type="text" name="value" class="form-control" value="">
            </div>
                    <button class="btn btn-success btn-block" type="submit">اضافة {{$setting_name}} جديدة </button>
        </form> 
        
        </div>
    </div>

@endsection

