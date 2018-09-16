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
            <td class="text-center">
                {{$datefrom}}
            </td>
            <td class="text-center">
                {{$dateto}}
            </td>

                
            </tr>  
        </table>
     <table class="table table-hover text-center">

        <thead class="thead-light">
        <tr>
            <th class="text-center">
               اسم الطالب
            </th>
            @foreach($subjects as $subject)
            <th class="text-center" >
             {{--    writing-mode: vertical-rl;
text-orientation: upright; --}}
                {{$subject->name}}
            </th>
            @endforeach

        </tr>
        </thead>
        <tbody>
            <form action="{{route('attendance.update')}}" method="get">
            
            @foreach($students as $student)
            <tr >
            <td class="text-center" >
                {{$student->name}}
            </td>
            {{-- subject->subject_pass()->first()->hours_count --}}
            @foreach($subjects as $subject)
            <td class="text-center" >
                {{ ($subject->attendances()->whereBetween('date',[$datefrom,$dateto])->where('student_id',$student->id)->where('status','0')->count()) *  $subject->hours}}
            </td>
            @endforeach

            </tr>  
            @endforeach

            <td colspan="3">
            <button class="btn  btn-lg btn-primary btn-block" type="submit">حــفــــظ قائمـــة الغــيـــاب</button> </td>
    </div>
        {{-- <input hidden type="text"  id="subject_id" name="subject_id" value="{{$subject_id}}"> --}}
        {{-- <input hidden type="text"  id="date" name="date" value="{{$date}}"> --}}
        </form>
        </tbody>
    </table> 

</div>
</div>

@endsection

