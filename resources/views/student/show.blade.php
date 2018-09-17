@extends('layouts.app')

@section('content')



<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم الطلاب  السنة الدراسية {{$level->year}}</b>
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
        </tr>
        </thead>
        <tbody>
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
            </tr>  
        </tbody>
    </table> 
    
    </div>
</div>

<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم الطلاب  السنة الدراسية {{$level->year}}</b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               اسم الطالب
            </th>
            <th class="text-center">
                الحالات الخاصة
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
            @foreach($students as $student)
            <tr >
            <td class="text-right">
                {{$student->name}}
            </td>
            <td class="text-center">
                <a href="{{route('special_case.index',['student_id'=>$student->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/case.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <a href="{{route('student.edit',['id'=>$student->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('student.destroy',['id'=>$student->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit"> <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>  
            @endforeach
            <a href="{{route('students.excel',$level->id)}}" class="btn btn-lg btn-primary btn-block" type="submit">Excel اضافة قائمة اسماء كاملة ملف </a> 
            <a href="{{route('students.studentcreate',$level->id)}}" class="btn btn-lg btn-success btn-block" type="submit">اضافة طالب جديد</a> 
            

        </tbody>
    </table> 
    <td colspan="3">
            <a href="{{route('students.studentcreate',$level->id)}}" class="btn  btn-lg btn-success btn-block" type="submit">اضافة طالب جديد</a> </td>
            <a href="{{route('students.excel',$level->id)}}" class="btn btn-lg btn-primary btn-block" type="submit">Excel اضافة قائمة اسماء كاملة ملف </a> 
    </div>
</div>

@endsection

