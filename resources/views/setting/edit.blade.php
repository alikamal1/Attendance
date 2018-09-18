@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>تعديل {{$setting->name}}</b>
        </div>
        <div class="card-body">
         <form action="{{route('setting.update',['id' => $setting->id])}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            
            <div class="form-group">
                <label for="value" style="float: right;"> ألاسم </label>
                <input type="text" name="value" class="form-control" value="{{$setting->value}}">
            </div>

            <div class="form-group">
                <input hidden type="text" name="name" class="form-control" value="{{$setting->name}}">
            </div>
                    <button class="btn btn-success  btn-lg btn-block" type="submit">حفظ التغيرات</button>
        </form> 
        
        </div>
    </div>



@endsection

