<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin/home')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">لوحة التحكم</span>
            </a>
        </li>

        <li class="nav-item nav-category">المحتويات</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#control" aria-expanded="false"
                aria-controls="control">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title"> <h4>لوحة التحكم</h4></span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="control">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('inviteds.index')}}"> <i class="menu-icon mdi mdi-file-send"></i>   إرسال الدعوات  </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('userInvite/index')}}"><i class="menu-icon mdi mdi-file-send"></i> الدعوات العامة  </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('titles.index')}}"><i class="menu-icon mdi mdi-format-title"></i>   الألقاب  </a> 
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('personclasses.index')}}"><i class="menu-icon mdi mdi-group"></i>   الفئات  </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('profile/edit')}}"><i class="menu-icon mdi mdi-account-settings"></i> تعديل بيانات الدخول</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employees/index')}}"><i class="menu-icon mdi mdi-account-plus"></i>  إدارة الموظفين  </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#eventDay" aria-expanded="false"
                aria-controls="eventDay">
                <i class="menu-icon mdi mdi-calendar-clock"></i>
                <span class="menu-title"><h4>يوم الحفل</h4></span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="eventDay">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/all')}}"><i class="menu-icon mdi mdi-file-send"></i> جميع الدعوات </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/all')}}"><i class="menu-icon mdi mdi-seat-recline-normal"></i> الكراسي</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/empty')}}"><i class="menu-icon mdi mdi-seat-recline-normal"></i> الكراسي الفارغة فقط</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('eventday/seat/reports')}}"><i class="menu-icon mdi mdi-file-document"></i> تقارير الكراسي</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('qrcode')}}">
                <i class="menu-icon mdi mdi-barcode-scan"></i>
                <span class="menu-title"><h4>qrcode</h4></span>
               
            </a>
            
        </li>

        

        <li class="nav-item nav-category">المساعدة</li>
        <li class="nav-item">
            <a class="nav-link"
                href="#">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">توثيق</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->