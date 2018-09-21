@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
اختر المادة المعنية لغرض تخصيص المادة الدراسية للتدريسين
</div>

 
      <script>


        window.onload  = function(){
        $("#yeardiv").show();
        $("#studydiv").hide();
        $("#stagediv").hide();
        $("#branchdiv").hide();
        $("#subjectdiv").hide();
        $("#datediv").hide();
        $("#submitdiv").hide();
            
        $('.teachers-select').select2({
            dir: "rtl",
            width: 'inherit',
            maximumSelectionLength: 8
        });

        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv").show();
                            $("#studydiv").hide();
                            $("#stagediv").hide();
                            $("#branchdiv").hide();
                            $("#subjectdiv").hide();
                            $("#teachersdiv").hide();
                            $("#submitdiv").hide();

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
                            $("#teachersdiv").hide();
                            $("#submitdiv").hide();

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
                            $("#teachersdiv").hide();
                            $("#submitdiv").hide();

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
                            $("#teachersdiv").hide();
                            $("#submitdiv").hide();

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
                            $("#submitdiv").hide();
                            
                            $("#subject").empty();
                            $("#subject").append('<option>اختر المادة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#subject").append('<option value="'+value.id+'">'+value.name+'</option>');
                            } );
                        }
                    });             
         }

        function gettachers()
        {
            $.ajax({
               type:'GET',
               url:'/ajax/getteachers/',
               success: function(response){
                console.log(response.teachers);
                            $("#submitdiv").hide();
                            $("#teachers").empty();
                            $("#teachers").append('<option disabled>اختر اسم التدريسين</option>');
                            $.each(response.teachers, function(index, value) {
                            $("#teachers").append('<option value="'+value.id+'">'+value.username+'</option>');
                            } );
                        }
                    }); 
            $("#teachersdiv").show();
        }

        function getsubmit()
        {
            $("#submitdiv").show();
        }


 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b>تخصص المواد الدراسية الخاصة بالتدريسين</b></div>
    <div class="card-body">
    <form action="{{route('teacher_subject.store')}}" method="GET">
        
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
            <select class="form-control" id="subject"  name="subject" onchange="gettachers()">
                
            </select>
        </div>
        <div class="form-group col-md-6"  id="teachersdiv">   
            <label style="float: right;">اختر التدريسين </label>
            <select class="teachers-select" id="teachers"  name="teachers[]"  multiple="multiple" style="width: 100%" onchange="getsubmit()">
                
            </select>
        </div>
        
    </div>
    <div class="form-group" id="submitdiv">
        <button type="submit" class="btn btn-success btn-block btn-lg"> حفظ</button>
    </div>
    </form>
    </div>
</div>


@endsection

