@extends('layouts.app')

@section('content')

<div class="alert alert-primary text-center"  role="alert">
اختر القائمة المعنية لغرض تعديل الغيابات او حذف قائمة او لغرض اضافة اجازة 
</div>

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
        $("#showresult").hide();
        

        $.ajax({
               type:'GET',
               url:'/ajax/getyear',
               success: function(response){
                            $("#yeardiv").show();
                            $("#studydiv").hide();
                            $("#stagediv").hide();
                            $("#branchdiv").hide();
                            $("#subjectdiv").hide();
                            $("#datediv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();

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
                            $("#datediv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();

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
                            $("#datediv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();

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
                            $("#datediv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();

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
                            $("#datediv").hide();
                            $("#submitdiv").hide();
                            $("#showresult").hide();
                            
                            $("#subject").empty();
                            $("#subject").append('<option>اختر المادة الدراسية</option>');
                            $.each(response.data, function(index, value) {
                            $("#subject").append('<option value="'+value.id+'">'+value.name+'</option>');
                            } );
                        }
                    });             
         }

        function getsubmit()
        {
            $("#submitdiv").show();
        }

        function getattendancelist()
        {
            document.getElementById("studytd").innerHTML = 'a';
            subject_id = $("#subject").find(":selected").val();
            $.ajax({
               type:'GET',
               url:'/ajax/getattendancelist/'+subject_id,
               success: function(response){
                
                        document.getElementById("studytd").innerHTML = response.level.study;
                        document.getElementById("stagetd").innerHTML = response.level.stage;
                        document.getElementById("branchtd").innerHTML = response.level.branch;
                        document.getElementById("subjecttd").innerHTML = response.subject;

                        $('#dates_table').empty();
                        var trHTML = '<thead class="thead-light"><tr><th class="text-center">التاريخ</th><th class="text-center">اضافة اجازة</th><th class="text-center">تعديل القائمة</th><th class="text-center">حذف القائمة</th></tr></thead>';
                        $.each(response.data, function (i, data) {
                            //bad urls
                        trHTML += '<tr ><td class="text-center"><button type="button" class="btn btn-outline-primary btn-block btn-lg">' + data.date + '</button> </td><td class="text-center"><a href="allow/'+data.subject_id+'/'+data.date + '"> <img width="30px" height="30px" src="{{asset('images/allow.png')}}" title="اجازة" alt="اجازة"></a></td><td class="text-center"><a href="edit/'+data.subject_id+'/'+data.date + '"> <img width="30px" height="30px" src="{{asset('images/edit.png')}}" title="تعديل" alt="تعديل"></a></td><td class="text-center"> <a href="delete/'+data.subject_id+'/'+data.date + '" class="delete-button" title="حذف" > <img width="30px" height="30px" src="{{asset('images/delete.png')}}" title="حذف" alt="حذف"></a></td></tr>';
                        });
                        $('#dates_table').append(trHTML);
                        }

                       

                    });
             $("#showresult").show();
        }




        

        


 
      </script>

<div class="card border-dark">
    <div class="card-header text-white bg-dark"><b>قوائم الغيابات</b></div>
    <div class="card-body">
        
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
            <select class="form-control" id="subject"  name="subject" onchange="getsubmit()">
                
            </select>
        </div>
        <div class="form-group col-md-6"  id="submitdiv" >  <br> 
            <button type="button" class="btn btn-primary btn-block btn-lg" onclick="getattendancelist()"> عرض الغيابات </button>
        </div>
    </div>

    </div>
</div>


<hr>


<div class="card border-dark" id="showresult">
    <div class="card-header text-white bg-dark">
        قوائم الغياب    
    </div>

    <div class="card-body">
             <table class="table table-hover text-center">

         <tr>
            <th class="text-center">
               الدراسة
            </th>
            <th class="text-center">
                المرحلة
            </th>
            <th class="text-center">
                الاختصاص
            </th>
             <th class="text-center">
                المادة
            </th>


        </tr>
            <tr >

            <td class="text-center" id="studytd">

            </td>
            <td class="text-center" id="stagetd">

            </td>    
            <td class="text-center" id="branchtd">

            </td>
            <td class="text-center" id="subjecttd">

            </td>


                
            </tr>  
        </table>
     <table class="table table-hover text-center" id="dates_table">

        
        <tbody>
             
    </div>

        </tbody>
    </table> 

</div>
</div>


@endsection

