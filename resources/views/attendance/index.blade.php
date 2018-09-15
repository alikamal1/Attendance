@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <script>
        window.onload  = function(){
        $("#yeardiv").show();
        $("#studydiv").hide();
        $("#stagediv").hide();
        $("#branchdiv").hide();
        $("#subjectdiv").hide();
        $("#datediv").hide();
        $("#submitdiv").hide();

       
        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv").show();
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
                            $("#branch").empty();
                            $("#branch").append('<option>اختر التخصص الدراسي </option>');
                            $.each(response.data, function(index, value) {
                            $("#branch").append('<option value="'+value.branch+'">'+value.branch+'</option>');
                            } );
                        }
                    });             
         }

        function getsubject(branch)
        {
            year = $("#year").find(":selected").text();
            study = $("#study").find(":selected").text();
            stage = $("#stage").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getsubject/' + year + '/' + study+ '/' + stage+ '/' + branch,
               success: function(response){
                            $("#subjectdiv").show();
                            $("#subject").empty();
                            $("#subject").append('<option>اختر المادة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#subject").append('<option value="'+value.id+'">'+value.name+'</option>');
                            } );
                        }
                    });             
         }

        function getdate()
        {
            $("#datediv").show();
        }

        function getsubmit()
        {
            $("#submitdiv").show();
        }


 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b>الغيابات</b></div>
    <div class="card-body">
    <form action="index_submit" method="post">
        
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
            <select class="form-control" id="branch"  name="branch" onchange="getsubject(this.value)">
                
            </select>
        </div>
    </div>
    
    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6"  id="subjectdiv">   
            <label style="float: right;">المادة</label>
            <select class="form-control" id="subject"  name="subject" onchange="getdate()">
                
            </select>
        </div>
        <div class="form-group col-md-6"  id="datediv" >   
            <label style="float: right;">التاريخ</label>
            <input type="text" class="form-group" data-provide="datepicker" style="text-align: center; padding: 5px; margin-top:32px;" onchange="getsubmit()">
        </div>
    </div>
    <div class="form-group" id="submitdiv">
        <button type="submit" class="btn btn-success btn-block btn-lg"> ادخال الغيابات</button>
    </div>
    </form>
    </div>
</div>

    
   



@endsection

