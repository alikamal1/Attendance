@extends('layouts.app')

@section('content')
<div class="alert alert-primary text-center" role="alert">
 المواد: تستخدم لتخصيص المواد الدراسية الخاصة بالتدريسي المعني
</div>
<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اسماء التدريسين </b>
    </div>
    <div class="card-body">
    <a class="btn btn-primary btn-block btn-lg" href="{{route('teacher.create')}}">
        اضافة تدريسي جديد
    </a><hr>
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               الاسم
            </th>
            <th class="text-right">
                المواد
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
@foreach($teachers as $teacher)
            <tr >
            <td class="text-right">
                {{$teacher->username}}
            </td>
            <td class="text-right">
                <a href="{{route('teacher_subject.home')}}">
                    <img width="30px" height="30px" src="{{asset('images/subject.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <a href="{{route('teacher.edit',['id'=>$teacher->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right">
                <form action="{{ route('teacher.destroy',['id'=>$teacher->id]) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="delete-button" title="حذف" type="submit" onclick="return confirm(' هل انت متاكد من عملية الحذف؟');" > <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </button>
                </form>
            </td>
            </tr>

@endforeach
            
        </tbody>

    </table> 
    <a class="btn btn-primary btn-block btn-lg" href="{{route('teacher.create')}}">
        اضافة تدريسي جديد
    </a>
    </div>
</div>

<br>


@endsection

