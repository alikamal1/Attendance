@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
اختر القائمة المعنية لغرض ادخال الغيابات
</div>

 
      <script>


        window.onload  = function(){
        $("#yeardiv").show();
        $("#submitdiv").hide();

        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){

                            $("#year").empty();
                            $("#year").append('<option>اختر السنة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#year").append('<option value="'+value.value+'">'+value.value+'</option>');
                            } );
                        }
                        
                    });

        }

        function showsubmit() {
                $("#submitdiv").show();
        }

 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b>ادخال الغيابات</b></div>
    <div class="card-body">
    <form action="{{route('teacher_subject.show')}}" method="GET">
        
    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6" id="yeardiv">   
            <label >السنة الدراسية</label>
            <select  class="form-control" id="year"  name="year" onchange="showsubmit()">
                
            </select>
        </div>  
        <div class="form-group col-md-6" id="submitdiv" >
            <br>
            <button type="submit" class="btn btn-block btn-lg btn-success">تعديل تخصيصي المواد</button>
        </div>
    </div>


    </form>
    </div>
</div>


@endsection

