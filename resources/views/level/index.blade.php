@extends('layouts.app')

@section('content')


@foreach($years as $year)

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات السنة الدراسية {{$year->value}}</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               الدراسة
            </th>
            <th class="text-right">
                المرحلة
            </th>
            <th class="text-right">
                الاختصاص
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
@foreach($levels as $level)
@if($level->year == $year->value)      
            <tr >
            <td class="text-right">
                {{$level->study}}
            </td>
            <td class="text-right">
                {{$level->stage}}
            </td>    
            <td class="text-right">
                {{$level->branch}}
            </td>
            <td class="text-right">
                <a href="{{route('level.edit',['id'=>$level->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('level.destroy',['id'=>$level->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>
@endif
@endforeach
            
        </tbody>
    </table> 
    <a href="{{route('level.show',[$year->value])}}" class="btn btn-success btn-lg btn-block" type="submit">اضافة المعلومات للسنة الدراسية {{$year->value}}</a> 
    </div>
</div>

<br>
@endforeach

@endsection

