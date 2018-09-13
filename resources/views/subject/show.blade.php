@extends('layouts.app')

@section('content')
<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم المواد الدراسية للسنة الدراسية {{$level->year}}</b>
    </div>

    <div class="card-body">
             <table class="table table-hover text-center">

         <tr>
            <th class="text-center">
               الدراسة
            </th>
            <th class="text-center">
                المرحلة
            </th>
            <th class="text-center">
                الاختصاص
            </th>
        </tr>
            <tr >

            <td class="text-center">
                {{$level->study}}
            </td>
            <td class="text-center">
                {{$level->stage}}
            </td>    
            <td class="text-center">
                {{$level->branch}}
            </td>
            </tr>  
        </table>
     <table class="table table-hover text-right">

        <thead class="thead-light">
        <tr>
            <th class="text-right">
               اسم المادة
            </th>
            <th class="text-right">
                نوع المادة
            </th>
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

            @foreach($level->subjects()->get() as $subject)
            <tr >
            <td class="text-right">
                {{$subject->name}}
            </td>
            <td class="text-right">
                {{$subject->subject_type}}
            </td>
            <td class="text-right">
                {{$subject->hours}}
            </td>
            <td class="text-right">
                <a href="{{route('subject.subjectedit',['id'=>$subject->id,'level_id'=>$level->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right" >

                    <a href="{{route('subject.destroysubject',['id'=>$subject->id,'level_id'=>$level->id])}}" class="delete-button" title="حذف" > <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </a>

            </td>
            </tr>  
            @endforeach

            
        </tbody>
    </table> 
    <td colspan="3">
            <a href="{{route('subject.subjectcreate',$level->id)}}"  class="btn  btn-lg btn-success btn-block" type="submit">اضافة مادة دراسية جديدة</a> </td>
    </div>


</div>

@endsection

