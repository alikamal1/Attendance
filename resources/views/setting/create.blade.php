@extends('layouts.app')

@section('content')
<script>
    function append()
    {
        $("#value").val($("#value").val() +" (نسبة الغياب "  + $("#ratio").val() + " % ) ");
    }
</script>
    @if($setting_name === 'انذرات')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>انشاء {{$setting_name}} جديدة</b>
        </div>
        <div class="card-body">
         <form action="{{route('setting.store')}}" onsubmit="append()"  method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <input hidden type="text" name="name" class="form-control" value="{{$setting_name}}">

                <label for="name" style="float: right;">الاسم</label>
                <input type="text" name="value" class="form-control" value="" id="value">
            </div>

            <div class="form-group">
                <input hidden type="text" name="name" class="form-control" value="{{$setting_name}}">

                <label for="name" style="float: right;">نسبة الغياب</label>
                <input type="text" placeholder="ادخل فقط رقم نسبة الغياب بدون اضافات مثال: 7"  class="form-control"  id="ratio">
            </div>

                    <button class="btn  btn-lg btn-success btn-block" type="submit">اضافة {{$setting_name}} جديدة </button>
        </form> 
        
        </div>
    </div>

    @else

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
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
                    <button class="btn  btn-lg btn-success btn-block"  type="submit">اضافة {{$setting_name}} جديدة </button>
        </form> 
        
        </div>
    </div>

    @endif



@endsection

