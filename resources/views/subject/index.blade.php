@extends('layouts.app')

@section('content')


@foreach($levels as $key => $leveldata)

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>المواد للسنة الدراسية {{$key}} </b>
    </div>
    <div class="card-body">
     <table class="table table-hover text-right">
        <thead class="thead-light">
        <tr>
            <th class="text-right">
               الدراسة
            </th>
            <th class="text-right">
                المرحلة
            </th>
            <th class="text-right">
                الاختصاص
            </th>
            <th class="text-right">
            </th>
            <th class="text-right">
            </th>
        </tr>
        </thead>
        <tbody>
	@foreach($leveldata as $level)  
    <tr >
    <td class="text-right">
        {{$level->study}}
    </td>
    <td class="text-right">
        {{$level->stage}}
    </td>    
    <td class="text-right">
        {{$level->branch}}
    </td>
    <td colspan="2" class="text-right">
        <a class="btn btn-primary btn-block" href="{{route('subject.showsubject',['id'=>$level->id])}}">
            عرض قوائم المواد
        </a>
    </td>
    
    </tr>
	@endforeach
            
        </tbody>
    </table> 
    
    </div>
</div>

<br>
@endforeach

@endsection

