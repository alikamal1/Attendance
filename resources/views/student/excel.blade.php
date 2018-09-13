@extends('layouts.app')

@section('content')



<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>قوائم الطلاب  السنة الدراسية {{$level->year}}</b>
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
        </tr>
        </thead>
        <tbody>
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
            </tr>  
        </tbody>
    </table> 
    
    </div>
</div>

<br>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>رفع ملف الاكسل الخاص بطلاب المرحلة {{$level->year}}</b>
    </div>
    <div class="card-body">
      <form action="{{ route('students.import',['id'=>$level->id]) }}" id="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
          <div class="alert alert-primary text-center"  role="alert">
              <img  style="height:300px"src="{{asset('images/excel.png')}}">
يجب ان يحتوي ملف الاكسل على عامود واحد يحتوي على الاسماء فقط </div>
        
          
 <input type="button" class="btn btn-primary btn-block btn-lg" id="loadFileXml" value="اضغط هنا لرفع ملف اسماء الطلاب"  onclick="document.getElementById('import_file').click();" />
<input type="file" style="display:none;" id="import_file" name="import_file" onchange ="document.getElementById('form').submit();">
            </form>

    </div>
</div>

@endsection

