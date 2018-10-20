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
            من فترة
        </th>
        <th class="text-center">
            لغاية
        </th>
        <th class="text-center">
            الانذار
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
        {{$datefrom}}
    </td>
    <td class="text-center">
        {{$dateto}}
    </td>   
    <td class="text-center">
        {{$ratio}}
    </td> 
    </tr>  
    </table>
        
     <table class="table text-center  table-bordered "   >
        <thead class="thead-light" >
        <tr>
            <th class="subjectth">
             <p style="height: fit-content; text-align: center; " > اســــم الطــالـــــــب </p> 
            </th>

            @foreach($subjects as $subject)
            <th class="subjectth" >
                <p class="subjects">{{$subject->name}}</p>   
            </th>
            @endforeach

        </tr>
        </thead>
        <tbody>
           
            
            @foreach($students as $student)

            <?php $flage=0?>
            @foreach($subjects as $subject)
                <?php $ratio_exceed=(($subject->attendances()->whereBetween('date',[$datefrom,$dateto])->where('student_id',$student->id)->where('status','0')->where('allow','0')->count()) *  $subject->hours) > (($ratio_int /100) * 30 );?>

                @if($ratio_exceed) <?php $flage=1?>
                @endif
            @endforeach
           
            @if($flage)

            <tr>
            <td class="text-center" >
                {{$student->name}}
            </td>
            {{-- subject->subject_pass()->first()->hours_count --}}
            @foreach($subjects as $subject)
            @if($student->specialcases()->where('subject_id',$subject->id)->get()->first() === null)
            <?php $ratio_exceed=(($subject->attendances()->whereBetween('date',[$datefrom,$dateto])->where('student_id',$student->id)->where('status','0')->where('allow','0')->count()) *  $subject->hours) > (($ratio_int /100) * 30 );?>
            <td class=" text-center" @if($ratio_exceed)style="background-color: #dbdbdb !important;         font-weight: bold;     border: 2px solid !important;"@endif >
                {{ ($subject->attendances()->whereBetween('date',[$datefrom,$dateto])->where('student_id',$student->id)->where('status','0')->where('allow','0')->count()) *  $subject->hours}}
            </td>
            @else
            <td class="text-center">
                مستوفي
            </td>
            @endif  
            @endforeach

            </tr>  
            @endif
            @endforeach
          
        </tbody>
    </table> 

<button id="printbtn2" class="btn btn-block btn-lg btn-primary" onclick="printreport()">طباعة قائمة الغيابات</button><br>

@endsection

