@extends('layouts.app')

@section('content')
<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>{{$teacher->username}} تخصيص المواد الدراسية للتدريسي </b>
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
            <th colspan="2" class="text-right">
                تخصيص المادة للتدريسي
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
            <td colspan="2" class="text-right">

                @if(is_null($s_t->where('subject_id',$subject->id)->first() ))
                <a class="btn btn-success btn-block" href="{{route('teacher.select',['subject_id'=>$subject->id,'teacher_id'=>$teacher->id,'level_id'=>$level->id])}}" title="">اختيار</a>
                @else
                <a class="btn btn-danger btn-block" href="{{route('teacher.unselect',['subject_id'=>$subject->id,'teacher_id'=>$teacher->id,'level_id'=>$level->id])}}" title="">الغاء</a>
                @endif
            </td>
            </tr>  
            @endforeach

            
        </tbody>
    </table> 

    </div>


</div>

@endsection

