@extends('layouts.app')

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
             <th class="text-center">
                المادة
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
                {{$date}}
            </td>

                
            </tr>  
        </table>
     <table class="table table-hover text-center">

        <thead class="thead-light">
        <tr>
            <th class="text-center">
               التسلسل
            </th>
            <th class="text-center">
               اسم الطالب
            </th>
            <th class="text-center">
                الحالة
            </th>

        </tr>
        </thead>
        <tbody>
            <form action="{{route('attendance.update')}}" method="get">
            <div class="form-group "  id="datediv" style="direction: rtl;text-align: center; ">   
                <label >التاريخ</label>
                <input type="text" id="date_new"  value="{{$date}}"  name="date_new" class="form-group" data-provide="datepicker" style="text-align: center; padding: 5px; margin-top:32px;" >
            </div>
            @foreach($students as  $key => $student)
            @if($student->attendances()->where('date',$date)->where('subject_id',$subject_id)->first())
            <tr >
            <td class="text-center">
                <b>{{$key+1}}</b>
            </td>
            <td class="text-center">
                {{$student->name}}
            </td>

            <td class="text-center">
                <input type="checkbox" id="{{$student->id}}" name="{{$student->id}}" value="{{$student->attendances()->where('date',$date)->where('subject_id',$subject_id)->first()->status}}" @if($student->attendances()->where('date',$date)->where('subject_id',$subject_id)->first()->status) checked @endif data-size="large"  data-toggle="toggle" data-on="حــاضــر" data-off="غــائــب" data-onstyle="success" data-offstyle="danger" onchange="changeAttendanceState({{$student->id}})">

                <input hidden type="text"  id="student_id={{$student->id}}" name="{{$student->id}}" value="{{$student->attendances()->where('date',$date)->where('subject_id',$subject_id)->first()->status}}">

            </td>

            </tr>  
            @endif
            @endforeach

            <td colspan="3">
            <button class="btn  btn-lg btn-primary btn-block" type="submit">حــفــــظ قائمـــة الغــيـــاب</button> </td>
    
        <input hidden type="text"  id="subject_id" name="subject_id" value="{{$subject_id}}">
        <input hidden type="text"  id="date_old" name="date_old" value="{{$date}}">
        </form>
        </tbody>
    </table> 

</div>
</div>

@endsection

