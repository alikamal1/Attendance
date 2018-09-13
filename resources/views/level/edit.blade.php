@extends('layouts.app')

@section('content')


<div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>تعديل المعلومات للسنة الدراسية {{$level->year}}</b>
        </div>
        <div class="card-body">
         <form action="{{route('level.update',['id'=>$level->id])}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <input hidden type="text" name="year" class="form-control" value="{{$level->year}}">
            <div class="form-group">   
                <label style="float: right;">الدراسة</label>
                <select class="form-control" name="study">
                    @foreach($settings as $setting)
                    @if($setting->name === 'دراسة')
                    <option  value="{{$setting->value}}" {{ $level->study == $setting->value ? "selected":"" }} >{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">المرحلة</label>
                <select class="form-control" name="stage">
                    @foreach($settings as $setting)
                    @if($setting->name === 'مرحلة')
                    <option  value="{{$setting->value}}" {{ $level->stage == $setting->value ? "selected":"" }}>{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">التخصص</label>
                <select class="form-control" name="branch">
                    @foreach($settings as $setting)
                    @if($setting->name === 'تخصص')
                    <option  value="{{$setting->value}}" {{ $level->branch == $setting->value ? "selected":"" }}>{{$setting->value}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success  btn-lg btn-block" type="submit">تعديل المعلومات  للسنة الدراسية</button>
        </form> 
        
        </div>
    </div>


@endsection

