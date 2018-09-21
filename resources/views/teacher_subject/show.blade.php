@extends('layouts.app')

@section('content')
@foreach($teachers as $teacher)
<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>{{$teacher->username}} تخصيص المواد الدراسية للتدريسي </b>
    </div>

    
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

            
            @foreach($teacher->subjects()->get() as $subject)
            {{-- @if($subject->level()->first()== null) --}}
                {{-- <td colspan="3">                لا توجد مواد مخصصة للتدريسي</td> --}}
            {{-- @else --}}
            @if($subject->level()->first()->year === $year)
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
                <a class="btn btn-danger btn-block" href="{{route('teacher_subject.destroy',['subject_id'=>$subject->id,'teacher_id'=>$teacher->id,'year'=>$year])}}" title="">الغاء</a>
            </td>
            </tr>  
            @endif
            {{-- @endif --}}
            @endforeach
           {{--  @else
             --}}
                
            


            
        </tbody>
    </table> 

    


</div>
<hr>
@endforeach
@endsection

