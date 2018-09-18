@extends('layouts.app')

@section('content')

<style>
    .subjects {
        writing-mode: tb-rl; 
        display: inline-flex;
        align-content: center;
        vertical-align: middle;
    }
    .subjectth {
        height: fit-content; 
        text-align: center; 
        vertical-align: middle;
        text-align: center !important;
    }

</style>
<script>
    window.onload = function() {
        $('#menudiv').hide();
        $('#navdiv').hide();
        $("#contentdiv").attr("class", "col-md-12");
        
    };
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

    function printreport() {
        $('#printbtn1').hide();
        $('#printbtn2').hide();
        $('#footerdiv').hide();
        
        window.print();

        $('#printbtn1').show();
        $('#printbtn2').show();
        $('#footerdiv').show();

    }
</script>

<button id="printbtn1" class="btn btn-block btn-lg btn-primary" onclick="printreport()">طباعة قائمة الغيابات</button><br>
<div class="card-header text-white bg-dark">
    <b>قوائم الغيابات {{$level->year}}</b>
</div>

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
            اسم الطالب
        </th>
         <th class="text-center">
            من فترة
        </th>
        <th class="text-center">
            لغاية
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
    <td class="text-center" >
                {{$student->name}}
    </td>
    <td class="text-center">
        {{$datefrom}}
    </td>
    <td class="text-center">
        {{$dateto}}
    </td>   
    </tr>  
    </table>
    <hr>
@foreach($attendancesList as $attendances)
<div class="card">
    <div class="card-header text-white bg-dark">
        <b> {{$attendances->first()->subject()->first()->name}}   <b>
    </div>
    <div class="card-body text-white ">
    <table class="table table-hover text-center">
    <tr>
        <th class="text-center">
           التاريخ
        </th>
        <th class="text-center">
            الحالة
        </th>
    </tr>
    @foreach($attendances as $attendance)
    <tr>
        <td class="text-center"><button disabled class="btn btn-primary btn-lg">{{$attendance->date}}</button></td>
        <td class="text-center">
            @if($attendance->allow)                      
            <button disabled class="btn btn-outline-primary btn-lg">مجاز</button>
            @else
            <input disabled type="checkbox" value="{{$attendance->status}}" @if($attendance->status) checked @endif data-size="large"  data-toggle="toggle" data-on="حــاضــر" data-off="غــائــب" data-onstyle="success" data-offstyle="danger" onchange="changeAttendanceState({{$student->id}})"></td>
            @endif
    </tr>
    @endforeach
    </table>
    </div>
</div>
<br>
@endforeach

      
<br>
<button id="printbtn2" class="btn btn-block btn-lg btn-primary" onclick="printreport()">طباعة قائمة الغيابات</button><br>

@endsection

