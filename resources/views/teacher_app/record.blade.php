@extends('layouts.teacher_app')

@section('content')

<script>
    function changeAttendanceState(id)
    {
        var Toggle = document.getElementById(id);
        if(Toggle.checked){
            /// Exist
            console.log('Exist');
             document.getElementById('student_id='+id).value = 1;
        } else {
            /// Absent
            console.log('absent');
            document.getElementById('student_id='+id).value = 0;
        }
        
    }
</script>


<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم اسماء الطلاب   {{$level->year}}</b>
    </div>

    <div class="card-body">
             {{-- <table class="table table-hover text-center">

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
             <th class="text-center">
                المادة
            </th>
            <th class="text-center">
                عدد الساعات
            </th>
            <th class="text-center">
                التاريخ
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
            <td class="text-center">
                {{$subject}}
            </td>
            <td class="text-center">
                {{$hours}}
            </td>
            <td class="text-center">
                {{$date}}
            </td>

                
            </tr>  
        </table> --}}
     <table class="table table-hover text-center">

        <thead class="thead-light">
        <tr>
            {{-- <th class="text-center">
               التسلسل
            </th> --}}
            <th class="text-center">
               اسم الطالب
            </th>
            <th class="text-center">
                الحالة
            </th>

        </tr>
        </thead>
        <tbody>
            <form action="{{route('teacher_app_attendance.store')}}" method="get">

            @foreach($students as  $key => $student)
            @if($student->specialcases()->where('subject_id',$subject_id)->get()->first() === null)
            <tr >
            {{-- <td class="text-center">
                <b>{{$key+1}}</b>
            </td> --}}
            <td class="text-center">
                {{$student->name}}
            </td>
            <td class="text-center">
                <input type="checkbox" id="{{$student->id}}" name="{{$student->id}}" value="1" data-size="large" checked data-toggle="toggle" data-on="حــاضــر" data-off="غــائــب" data-onstyle="success" data-offstyle="danger" onchange="changeAttendanceState({{$student->id}})">

                <input hidden type="text"  id="student_id={{$student->id}}" name="{{$student->id}}" value="1">

            </td>
            </tr>
            @else
            <tr >
            <td class="text-center">
                <b>{{$key+1}}</b>
            </td>
            <td class="text-center">
                {{$student->name}}
            </td>
            <td class="text-center">
                <button disabled class="btn btn-outline-primary btn-lg">مستوفي</button>
            </td>
            </tr>
            @endif  
            @endforeach
            <td colspan="3">
            <button class="btn  btn-lg btn-primary btn-block" type="submit">حــفــــظ قائمـــة الغــيـــاب</button> </td>
    </div>
        <input hidden type="text"  id="subject_id" name="subject_id" value="{{$subject_id}}">
        <input hidden type="text"  id="date" name="date" value="{{$date}}">
        <input hidden type="text"  id="hours" name="hours" value="{{$hours}}">
        <input hidden type="text"  id="teacher" name="teacher" value="{{$teacher}}">
        </form>
        </tbody>
    </table> 

</div>
</div>

@endsection

