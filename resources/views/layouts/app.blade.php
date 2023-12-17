<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    @include('layouts.head')
</head>

<body>
    @include('sweetalert::alert')
    @include('layouts.navbar')

    @yield('content')

    <br />
    <br />
    <br />


    @include('layouts.footer')

    @include('layouts.javascripts')
</body>

</html>
