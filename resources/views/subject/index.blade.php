@extends('layouts.app')

@section('content')


<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات المواد الدراسية</b>
    </div>
    <div class="card-body">
        @foreach($years as $year)
        <a href="{{route('subject.showsubject',[$year->value])}}" class="btn btn-primary btn-block btn-lg" type="submit"><b>{{$year->value}}</b> عرض مواد السنة الدراسية</a><hr>

        @endforeach
    </div>

</div>


@endsection

