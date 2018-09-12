@extends('layouts.app')

@section('content')

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات السنين الدراسية</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               السنة الدراسية
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_year->count() >0)
            @foreach($settings_year as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <tr><td colspan="3"> <a href="{{route('setting.show',['سنة'])}}" class="btn btn-success btn-block" >اضافة سنة دراسية جديدة </a> </td></tr>
        </tbody>
    </table>  
    </div>
</div>

<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات انوع الدراسة</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               نوع الدراسة
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_study->count() >0)
            @foreach($settings_study as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <tr><td colspan="3"> <a href="{{route('setting.show',['دراسة'])}}" class="btn btn-success btn-block" >اضافة نوع دراسة جديدة </a> </td></tr>
        </tbody>
    </table>  
    </div>
</div>

<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات المراحل الدراسية</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               المرحلة الدراسية
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_stage->count() >0)
            @foreach($settings_stage as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <td colspan="3"> <a href="{{route('setting.show',['مرحلة'])}}" class="btn btn-success btn-block" >اضافة سنة مرحلة جديدة </a> </td>
        </tbody>
    </table>  
    </div>
</div>

<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات نوع التخصص</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               نوع التخصص
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_branch->count() >0)
            @foreach($settings_branch as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <td colspan="3"> <a href="{{route('setting.show',['تخصص'])}}" class="btn btn-success btn-block" >اضافة نوع تخصص جديد </a> </td>
        </tbody>
    </table>  
    </div>
</div>


<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات نوع المواد</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               نوع المادة
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_subject_type->count() >0)
            @foreach($settings_subject_type as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <td colspan="3"> <a href="{{route('setting.show',['مادة'])}}" class="btn btn-success btn-block" >اضافة نوع مادة جديد </a> </td>
        </tbody>
    </table>  
    </div>
</div>


<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات الساعات الدراسية</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               عدد الساعات
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_hours->count() >0)
            @foreach($settings_hours as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <td colspan="3"> <a href="{{route('setting.show',['ساعة'])}}" class="btn btn-success btn-block" >اضافة عدد ساعات جديد </a> </td>
        </tbody>
    </table>  
    </div>
</div>


<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات نوع الاجازة</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               نوع الاجازة
            </th>
            <th class="text-right">
                تعديل
            </th>
            <th class="text-right">
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        @if($settings_case_type->count() >0)
            @foreach($settings_case_type as $setting)
            <tr >
            <td class="text-right">
                {{$setting->value}}
            </td>
            <td class="text-right">
                <a href="{{route('setting.edit',['id'=>$setting->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('setting.destroy',['id'=>$setting->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            @else
                <tr><td colspan="3" class="text-center">لا توجد اعدادات حاليا</td></tr>
        @endif
        <td colspan="3"> <a href="{{route('setting.show',['اجازة'])}}" class="btn btn-success btn-block" >اضافة نوع اجازة جديد </a> </td>
        </tbody>
    </table>  
    </div>
</div>


@endsection

