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

            
        
                
           <form action="{{route('special_case.store')}}" method="post">
               {{csrf_field()}}
           <div class="row" style="direction: rtl;">
            <div class="form-group col-md-6">   
                <label style="float: right;">اسم المادة </label>
                <select class="form-control" name="subject_id">
                    @foreach($student->level()->first()->subjects()->get() as $subject)
                    <option  value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">   
                <label style="float: right;">نوع الحالة  </label>
                <select class="form-control" name="special_case">
                    @foreach($special_cases as $special_case)
                    <option  value="{{$special_case->value}}">{{$special_case->value}}</option>
                    @endforeach
                </select>
          </div>
          <input type="text" name="student_id" hidden value="{{$student->id}}">


            <button   class="btn btn-lg btn-success btn-block" type="submit">حفظ الحالة الخاصة للطالب</button> 
            </form>
        </div>
    </div>
</div>

@endsection

