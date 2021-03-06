@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
طباعة تقارير الحضور -فقط الغياب- 
</div>

 
      <script>

        window.onload  = function(){
        $("#yeardiv").show();
        $("#studydiv").hide();
        $("#stagediv").hide();
        $("#branchdiv").hide();
        $("#subjectdiv").hide();
        $("#datefromdiv").hide();
        $("#datetodiv").hide();  
        $("#submitdiv").hide();
        $("#ratiodiv").hide();

        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv").show();
                            $("#studydiv").hide();
                            $("#stagediv").hide();
                            $("#branchdiv").hide();
                            $("#subjectdiv").hide();
                            $("#datefromdiv").hide();
                            $("#datetodiv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();
                            $("#ratiodiv").hide();

                            $("#year").empty();
                            $("#year").append('<option>اختر السنة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#year").append('<option value="'+value.value+'">'+value.value+'</option>');
                            } );
                        }
                    });

        }
        function getstudy(year)
        {   
            $.ajax({
               type:'GET',
               url:'/ajax/getstudy/' + year,
               success: function(response){
                            $("#studydiv").show();
                            $("#stagediv").hide();
                            $("#branchdiv").hide();
                            $("#subjectdiv").hide();
                            $("#datefromdiv").hide();
                            $("#datetodiv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide()
                            $("#ratiodiv").hide();

                            $("#study").empty();
                            $("#study").append('<option>اختر نوع الدراسة</option>');
                            $.each(response.data, function(index, value) {
                            $("#study").append('<option value="'+value.study+'">'+value.study+'</option>');
                            } );
                        }
                    });             
         }

        function getstage(study)
        {
            year = $("#year").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getstage/' + year + '/' + study,
               success: function(response){
                            $("#stagediv").show();
                            $("#branchdiv").hide();
                            $("#subjectdiv").hide();
                            $("#datefromdiv").hide();
                            $("#datetodiv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide()
                            $("#ratiodiv").hide();

                            $("#stage").empty();
                            $("#stage").append('<option> اختر المرحلة الدراسية </option>');
                            $.each(response.data, function(index, value) {
                            $("#stage").append('<option value="'+value.stage+'">'+value.stage+'</option>');
                            } );
                        }
                    });             
         }

        function getbranch(stage)
        {
            year = $("#year").find(":selected").text();
            study = $("#study").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getbranch/' + year + '/' + study+ '/' + stage,
               success: function(response){
                            $("#branchdiv").show();
                            $("#subjectdiv").hide();
                            $("#datefromdiv").hide();
                            $("#datetodiv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide()
                            $("#ratiodiv").hide();

                            $("#branch").empty();
                            $("#branch").append('<option>اختر التخصص الدراسي </option>');
                            $.each(response.data, function(index, value) {
                            $("#branch").append('<option value="'+value.branch+'">'+value.branch+'</option>');
                            } );
                        }
                    });             
         }

               

        function getdatefrom()
        {
            $("#datefromdiv").show();
        }
          
        function getdateto()
        {
            $("#datetodiv").show();
            
        }

        function getratio()
        {
            $("#ratiodiv").show();
            
            $.ajax({
               type:'GET',
               url:'/ajax/getratio/',
               success: function(response){
                            $("#ratio").empty();
                            $("#ratio").append('<option>اختر نسبة الغياب </option>');
                            $.each(response.data, function(index, value) {
                            $("#ratio").append('<option value="'+value.value+'">'+value.value+'</option>');
                            } );
                        }
                    });             
         }

        function getsubmit()
        {
            year = $("#year").find(":selected").text();
            study = $("#study").find(":selected").text();
            stage = $("#stage").find(":selected").text();
            branch = $("#branch").find(":selected").text();

            $.ajax({
               type:'GET',
               url:'/ajax/getlevelid/' + year + '/' + study+ '/' + stage+ '/' + branch,
               success: function(response){
                            $("#level_id").val(response.level_id)
                            $("#submitdiv").show();
                        }
                    });   


        }


 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b> تقارير الغيابات</b></div>
    <div class="card-body">
    <form action="{{route('report.show_absent')}}" method="GET" target="_blank">
        
    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6" id="yeardiv">   
            <label >السنة الدراسية</label>
            <select  class="form-control" id="year"  name="year"  onchange="getstudy(this.value)">
                
            </select>
        </div>  

        <div class="form-group col-md-6"  id="studydiv">   
            <label >نوع الدراسة</label>
            <select class="form-control" id="study"  name="study" onchange="getstage(this.value)">
                
            </select>
        </div>
       

    </div>


    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6"  id="stagediv">    
        <label style="float: right;">المرحلة</label>
        <select class="form-control" id="stage"  name="stage" onchange="getbranch(this.value)">
            
        </select>
        </div>
        <div class="form-group col-md-6"  id="branchdiv">   
            <label style="float: right;">الاختصاص</label>
            <select class="form-control" id="branch"  name="branch" onchange="getdatefrom()">
                
            </select>
        </div>
    </div>
    
    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6"  id="datefromdiv">   
            <label style="float: right;">  التاريخ من فترة</label>
            <input type="text" id="datefrom"  name="datefrom" class="form-group" data-provide="datepicker" style="text-align: center; padding: 5px; margin-top:32px;" onchange="getdateto()" autocomplete="off">
        </div>
        <div class="form-group col-md-6"  id="datetodiv" >   
            <label style="float: right;"> التاريخ الى فترة</label>
            <input type="text" id="dateto"  name="dateto" class="form-group" data-provide="datepicker" style="text-align: center; padding: 5px; margin-top:32px;" onchange="getratio()" autocomplete="off">
        </div>
    </div>
    <div class="form-row text-right"  >
        <div class="form-group col-md-6 offset-md-3"  id="ratiodiv" style="direction: rtl;">   
            <label style="float: right;">نوع الانذار </label>
            <select class="form-control" id="ratio"  name="ratio" onchange="getsubmit()">
                
            </select>
        </div>
    </div>
    <div class="form-group" id="submitdiv">
        <br>
        <input hidden type="text" id="level_id" name="level_id">
        <button type="submit"  class="btn btn-success btn-block btn-lg"> اعرض التقرير</button>
    </div>
    
    </form>
    </div>
</div>


@endsection

