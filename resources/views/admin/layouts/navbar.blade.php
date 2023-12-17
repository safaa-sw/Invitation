<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ route('admin/home') }}">
                <img src="{{asset('template/logo.png')}}" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="{{ route('admin/home') }}">
                <img src="{{asset('template/logo.png')}}" alt="logo" />
              </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text"> مرحباً، <span
                        class="text-black fw-bold">{{ Auth::guard('admin')->user()->name }}</span></h1>
               
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="icon-calendar input-group-text calendar-icon"></span>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </li>
            <li class="nav-item">
                <a class="btn btn-success" href="#"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">تسجيل الخروج </a>
                    <form id="logout-form" action="{{ route('admin/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
           
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
