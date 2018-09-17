@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
 اختر قائمة الطلاب 
</div>

@foreach($years as $year)

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم الطلاب  السنة الدراسية {{$year->value}}</b>
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
            </th>
            <th class="text-right">
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
            <td colspan="2" class="text-right">
                <a class="btn btn-success  btn-lg btn-block" href="{{route('student.show',['id'=>$level->id])}}">
                    عرض قوائم اسماء   الطلاب
                </a>
            </td>
            
            </tr>
@endif
@endforeach
            
        </tbody>
    </table> 
    
    </div>
</div>

<br>
@endforeach

@endsection

