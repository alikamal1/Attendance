@extends('layouts.app')

@section('content')


<div class="card border-dark">
        <div class="card-header text-white bg-dark">
            <b>تخصيص المواد الدراسية الخاصة بالتدريسي</b>
        </div>
        <div class="card-body">
         <form action="{{route('teacher.subject_teacher',['id'=>$teacher->id])}}" method="POST" style="direction: rtl;">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">   
                <label style="float: right;">مواد السنة الدراسية</label>
                <select class="form-control" name="year">
                    @foreach($years as $year)
                    <option  value="{{$year->value}}" >{{$year->value}}</option>
                    @endforeach
                </select>
            </div>
           <button class="btn btn-success btn-block" type="submit">عرض مواد السنة الدراسية</button>
        </form> 
        
        </div>
    </div>


@endsection

