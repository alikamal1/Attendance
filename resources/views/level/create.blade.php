@extends('layouts.app')

@section('content')


<div class="card">
        <div class="card-header">
            <b>انشاء معلومات جديدة للسنة الدراسية</b>
        </div>
        <div class="card-body">
         <form action="{{route('level.store')}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <input hidden type="text" name="year" class="form-control" value="{{$year}}">
            <div class="form-group">   
                <label style="float: right;">الدراسة</label>
                <select class="form-control" name="study">
                    @foreach($settings as $setting)
                    @if($setting->name === 'دراسة')
                    <option  value="{{$setting->value}}">{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">المرحلة</label>
                <select class="form-control" name="stage">
                    @foreach($settings as $setting)
                    @if($setting->name === 'مرحلة')
                    <option  value="{{$setting->value}}">{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">التخصص</label>
                <select class="form-control" name="branch">
                    @foreach($settings as $setting)
                    @if($setting->name === 'تخصص')
                    <option  value="{{$setting->value}}">{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success btn-block" type="submit">اضافة المعلومات للسنة الدراسية</button>
        </form> 
        
        </div>
    </div>


@endsection

