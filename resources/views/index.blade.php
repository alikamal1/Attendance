
@extends('layouts.app')

@section('content')


<div class="card-deck mb-3 text-center " style="direction: rtl;">
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">الغيابات</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/absent.png')}}" alt="">
    <hr>
    <a href="{{route('attendance.index')}}" class="btn btn-lg btn-block btn-primary">ادخال الغياب</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">التقارير</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/report.png')}}" alt="">
    <hr>
    <a href="{{route('report.home')}}" class="btn btn-lg btn-block btn-primary">تقارير الغيابات</a>
    </div>
  </div>
  
</div>

<div class="card-deck mb-3 text-center " style="direction: rtl;">
    <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal"> اعدادات الغيابات</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/edit_absent.png')}}" alt="">
    <hr>
    <a href="{{route('attendance.show')}}" class="btn btn-lg btn-block btn-primary">تعديل الغيابات</a>
    </div>
  </div>
    
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحة تحكم الطلاب</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/student.png')}}" alt="">
    <hr>
    <a href="{{route('student.index')}}" class="btn btn-lg btn-block btn-primary">الطلاب</a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحة تحكم التدريسيين</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/profile.png')}}" alt="">
    <hr>
    <a href="{{route('teacher.index')}}" class="btn btn-lg btn-block btn-primary">التدريسيين</a>
    </div>
  </div>
  
</div>


<div class="card-deck mb-3 text-center " style="direction: rtl;">
    <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحة تحكم التخصيص</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/teacher_subject.png')}}" alt="">
    <hr>
    <a href="{{route('teacher_subject.home')}}" class="btn btn-lg btn-block btn-primary"> تخصيصي المواد للتدريسين </a>
    </div>
  </div>
    <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحة تحكم المواد</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/subjects.png')}}" alt="">
    <hr>
    <a href="{{route('subject.index')}}" class="btn btn-lg btn-block btn-primary"> المواد الدراسية </a>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحة تحكم المراحل </h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/level.png')}}" alt="">
    <hr>
    <a href="{{route('level.index')}}" class="btn btn-lg btn-block btn-primary">المراحل الدراسية</a>
    </div>
  </div>
  
</div>
<div class="card-deck mb-3 text-center " style="direction: rtl;">
<div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">لوحدة تحكم النسخ</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/copy.png')}}" alt="">
    <hr>
    <a href="{{route('copy.index')}}" class="btn btn-lg btn-block btn-primary"> نسخ القوائم</a>
    </div>
  </div>


 <div class="card mb-4 shadow-sm">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal">النظام</h4>
    </div>
    <div class="card-body">
    <img src="{{asset('images/setting.png')}}" alt="">
    <hr>
    <a href="{{route('setting.index')}}" class="btn btn-lg btn-block btn-primary">اعدادات النظام</a>
    </div>
  </div>
</div>
@endsection
