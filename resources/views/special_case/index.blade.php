@extends('layouts.app')

@section('content')

    <div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>قائمة الحالات الخاصة  </b>
        </div>
        <div class="card-body">

            <table class="table table-hover text-center">

         <tr>
            <th class="text-center">
               اسم الطالب
            </th>
            <th class="text-center">
                السنة الدراسية
            </th>
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
                {{$student->name}}
            </td>
            <td class="text-center">
                {{$level->year}}
            </td>
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
                نوع الحالة
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

            @foreach($student->specialcases()->get() as $specialcase)
            <tr >
            <td class="text-right">
                {{$specialcase->subject()->first()->name}}
            </td>
            <td class="text-right">
                {{$specialcase->case_type}}
            </td>
            <td class="text-right">
                <a href="{{route('special_case.edit',['special_case_id'=>$specialcase->id,'student_id'=>$student->id])}}">
                    <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل">
                </a>
            </td>
            <td class="text-right" >

                    <a href="{{route('special_case.destroy',['special_case_id'=>$specialcase->id,'student_id'=>$student->id])}}" onclick="return confirm(' هل انت متاكد من عملية الحذف؟');"  class="delete-button" title="حذف" > <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف">
                    </a>

            </td>
            </tr>  
            @endforeach

            
        </tbody>
    </table> 
    <td colspan="3">
            <a href="{{route('special_case.create',$student->id)}}"  class="btn  btn-lg btn-success btn-block" type="submit">اضافة حالة خاصة جديدة</a> </td>

        </div>
    </div>

@endsection

