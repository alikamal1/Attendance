@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <b>تعديل معلومات الطالب</b>
        </div>
        <div class="card-body">
         <form action="{{route('student.update',$student->id)}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name" style="float: right;">الاسم</label>
                <input type="text" name="name" class="form-control" value="{{$student->name}}">
            </div>
            <div class="form-group">   
                <label style="float: right;">الدراسة</label>
                <select class="form-control" name="study">
                    @foreach($levels as $level)
                    <option  value="{{$level->study}}"  {{ $studentLevel->study == $level->study ? "selected":"" }}>{{$level->study}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">المرحلة</label>
                <select class="form-control" name="stage">
                    @foreach($levels as $level)
                    <option  value="{{$level->stage}}" {{ $studentLevel->stage == $level->stage ? "selected":"" }}>{{$level->stage}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">   
                <label style="float: right;">التخصص</label>
                <select class="form-control" name="branch">
                    @foreach($levels as $level)
                    <option  value="{{$level->branch}}" {{ $studentLevel->branch == $level->branch ? "selected":"" }}>{{$level->branch}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" hidden name="year" class="form-control" value="{{$studentLevel->year}}">
                    <button class="btn btn-success btn-block" type="submit">حفظ اسم الطالب الجديد</button>
        </form> 
        
        </div>
    </div>

@endsection

