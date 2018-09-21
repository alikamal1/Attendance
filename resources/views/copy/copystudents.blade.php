@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
اختر القائمة المعنية لغرض نسخها 
</div>

 
      <script>


        window.onload  = function(){
        $("#yeardiv").show();
        $("#studydiv").hide();
        $("#stagediv").hide();
        $("#branchdiv").hide();
        $("#submitdiv").hide();
        
        $("#yeardiv2").show();
        $("#studydiv2").hide();
        $("#stagediv2").hide();
        $("#branchdiv2").hide();
        $("#submitdiv2").hide();
        $("#yeardiv2").hide();

        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv").show();
                            $("#studydiv").hide();
                            $("#stagediv").hide();
                            $("#branchdiv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();

                            $("#yeardiv2").hide();
                            $("#studydiv2").hide();
                            $("#stagediv2").hide();
                            $("#branchdiv2").hide();
                            $("#submitdiv2").hide();

                            $("#year").empty();
                            $("#year").append('<option>اختر السنة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#year").append('<option value="'+value.value+'">'+value.value+'</option>');
                            } );
                        }
                    });
            
        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv2").show();
                            $("#studydiv2").hide();
                            $("#stagediv2").hide();
                            $("#branchdiv2").hide();
                            $("#yeardiv2").hide();
                            $("#showresult2").hide();

                            $("#year2").empty();
                            $("#year2").append('<option>اختر السنة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#year2").append('<option value="'+value.value+'">'+value.value+'</option>');
                            } );
                        }
                    });

        }
        function getstudy2(year)
        {   
            $.ajax({
               type:'GET',
               url:'/ajax/getstudy/' + year,
               success: function(response){
                            $("#studydiv2").show();
                            $("#stagediv2").hide();
                            $("#branchdiv2").hide();
                            $("#showresult2").hide()

                            $("#study2").empty();
                            $("#study2").append('<option>اختر نوع الدراسة</option>');
                            $.each(response.data, function(index, value) {
                            $("#study2").append('<option value="'+value.study+'">'+value.study+'</option>');
                            } );
                        }
                    });             
         }

        function getstage2(study)
        {
            year = $("#year2").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getstage/' + year + '/' + study,
               success: function(response){
                            $("#stagediv2").show();
                            $("#branchdiv2").hide();

                            $("#stage2").empty();
                            $("#stage2").append('<option> اختر المرحلة الدراسية </option>');
                            $.each(response.data, function(index, value) {
                            $("#stage2").append('<option value="'+value.stage+'">'+value.stage+'</option>');
                            } );
                        }
                    });             
         }

        function getbranch2(stage)
        {
            year = $("#year2").find(":selected").text();
            study = $("#study2").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getbranch/' + year + '/' + study+ '/' + stage,
               success: function(response){
                            $("#branchdiv2").show();

                            $("#branch2").empty();
                            $("#branch2").append('<option>اختر التخصص الدراسي </option>');
                            $.each(response.data, function(index, value) {
                            $("#branch2").append('<option value="'+value.branch+'">'+value.branch+'</option>');
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
                            $("#yeardiv2").hide();
                            $("#showresult").hide()

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
                            $("#yeardiv2").hide();
                            $("#showresult").hide()

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
                            $("#yeardiv2").hide();

                            $("#branch").empty();
                            $("#branch").append('<option>اختر التخصص الدراسي </option>');
                            $.each(response.data, function(index, value) {
                            $("#branch").append('<option value="'+value.branch+'">'+value.branch+'</option>');
                            } );
                        }
                    });             
         }


        function getyear2() {
            $("#yeardiv2").show();
        }

         function getsubmit() {
            year = $("#year").find(":selected").text();
            study = $("#study").find(":selected").text();
            stage = $("#stage").find(":selected").text();
            branch = $("#branch").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getlevelid/' + year + '/' + study+ '/' + stage+ '/' + branch,
               success: function(response){
                            $("#level_id1").val(response.level_id)
                        }
                    }); 

            year = $("#year2").find(":selected").text();
            study = $("#study2").find(":selected").text();
            stage = $("#stage2").find(":selected").text();
            branch = $("#branch2").find(":selected").text();
            $.ajax({
               type:'GET',
               url:'/ajax/getlevelid/' + year + '/' + study+ '/' + stage+ '/' + branch,
               success: function(response){
                            $("#level_id2").val(response.level_id)
                            $("#submitdiv").show();
                        }
                    });     

         }
          


 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b> نسخ معلومات الطلاب من </b></div>
    <div class="card-body">
    <form action="{{route('copy.student')}}" method="GET">
        
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
            <select class="form-control" id="branch"  name="branch" onchange="getyear2()">
                
            </select>
        </div>
    </div>
    

    </div>
</div>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b> نسخ معلومات الطلاب الى </b></div>
    <div class="card-body">
        
    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6" id="yeardiv2">   
            <label >السنة الدراسية</label>
            <select  class="form-control" id="year2"  name="year2"  onchange="getstudy2(this.value)">
                
            </select>
        </div>  

        <div class="form-group col-md-6"  id="studydiv2">   
            <label >نوع الدراسة</label>
            <select class="form-control" id="study2"  name="study2" onchange="getstage2(this.value)">
                
            </select>
        </div>
       

    </div>


    <div class="form-row text-right" style="direction: rtl;" >
        <div class="form-group col-md-6"  id="stagediv2">    
        <label style="float: right;">المرحلة</label>
        <select class="form-control" id="stage2"  name="stage2" onchange="getbranch2(this.value)">
            
        </select>
        </div>
        <div class="form-group col-md-6"  id="branchdiv2">   
            <label style="float: right;">الاختصاص</label>
            <select class="form-control" id="branch2"  name="branch2" onchange="getsubmit()">
                
            </select>
        </div>
    </div>
    
    <div class="form-group" id="submitdiv">
        <input hidden type="text" id="level_id1" name="level_id1">
        <input hidden type="text" id="level_id2" name="level_id2">

        <button type="submit" class="btn btn-success btn-block btn-lg">بدء عملية النسخ </button>
    </div>
    </form>
    </div>
</div>


@endsection

