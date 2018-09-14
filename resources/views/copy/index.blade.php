@extends('layouts.app')

@section('content')

{{-- <script>
         function getstudy(year){

            $.ajax({
               type:'GET',
               url:'/copy/getstudy/'+year,

               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
 --}}
      <script>
window.onload  = function(){
    $("#recieverlist").hide();

}
        function getstudy(year)
        {
            $.ajax({
               type:'GET',
               url:'/copy/getstudy/'+year,
               success: function(response){
                            $("#recieverlist").show();
                            $("#recieverlist").empty();
                            $.each(response.data, function(index, value) {
                            $("#recieverlist").append('<option value="'+value.id+'">'+value.study+'</option>');
                            } );
                        }
                    })               
         }
 
      </script>
<select id="recieverlist" name="select" class="main-form">
    </select>

<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>اعدادات النسخ</b>
    </div>
    <div class="card-body">
    

    <div class="form-group">   
        <label style="float: right;">عدد الساعات</label>
        <select class="form-control"  name="hours" onchange="getstudy(this.value)">
            @foreach($levels as $level)
            <option  value="{{$level->year}}" >{{$level->year}}</option>
            @endforeach
        </select>
    </div>  

{{-- 
<div class="card border-dark">
    <div class="card-header text-white bg-dark">
        <b>المواد للسنة الدراسية  </b>
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



    <div class="form-group">   
        <label style="float: right;">عدد الساعات</label>
        <select class="form-control" name="hours">
            @foreach($levels as $level)
            <option  value="{{$level->year}}"  }}>{{$level->study}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">   
        <label style="float: right;">عدد الساعات</label>
        <select class="form-control" name="hours">
            @foreach($levels as $level)
            <option  value="{{$level->year}}"  }}>{{$level->year}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">   
        <label style="float: right;">عدد الساعات</label>
        <select class="form-control" name="hours">
            @foreach($levels as $level)
            <option  value="{{$level->year}}"  }}>{{$level->year}}</option>
            @endforeach
        </select>
    </div>

    <tr >
  <td class="text-right">
        {{$level->study}}
    </td>
    <td class="text-right">
        {{$level->stage}}
    </td>    
    <td class="text-right">
        {{$level->branch}} --}}
{{--     </td>
    <td colspan="2" class="text-right">
        <a class="btn btn-primary  btn-lg btn-block" href="{{route('subject.showsubject',['id'=>$level->id])}}">
            عرض قوائم المواد
        </a>
    </td>
    
    </tr>
     
        </tbody>
    </table> 
    
    </div>
</div>

<br> --}} 

    </div>
</div>


@endsection

