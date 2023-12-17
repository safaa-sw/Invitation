<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        
        <li class="nav-item nav-category">المحتويات</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#control" aria-expanded="true"
                aria-controls="control">
                <i class="mdi mdi-grid"></i>
                <span> &nbsp; &nbsp;&nbsp; </span>
                <span class="menu-title"> <h4>لوحة التحكم</h4></span>
                <i class="mdi mdi-menu-left"></i>
            </a>

            <div class="collapse" id="control">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('inviteds.index')}}">إرسال الدعوات</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('userInvite/index')}}"> الدعوات العامة  </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('titles.index')}}">الألقاب  </a> 
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('personclasses.index')}}"> الفئات </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('profile/edit')}}">تعديل بيانات الدخول </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employees/index')}}"> إدارة الموظفين  </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#eventDay" aria-expanded="false"
                aria-controls="eventDay">
                <i class="mdi mdi-calendar-clock"></i>
                <span> &nbsp; &nbsp;&nbsp; </span>
                <span class="menu-title"><h4>يوم الحفل</h4></span><span> &nbsp; &nbsp; </span>
                <i class="mdi mdi-menu-left"></i>
            </a>
            <div class="collapse" id="eventDay">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/all')}}"> جميع الدعوات </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/all')}}"> الكراسي</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/empty')}}"> الكراسي الفارغة فقط</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/reports')}}"> تقارير الكراسي</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('qrcode')}}">
                <i class="mdi mdi-barcode"></i>
                <span> &nbsp; &nbsp;&nbsp; </span>
                <span class="menu-title"><h4>qrcode </h4></span>
                
               
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->