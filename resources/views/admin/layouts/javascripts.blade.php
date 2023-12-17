<!-- plugins:js -->
<script src="{{ asset('templateA/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('templateA/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('templateA/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('templateA/vendors/progressbar.js/progressbar.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('templateA/js/off-canvas.js') }}"></script>
<script src="{{ asset('templateA/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('templateA/js/template.js') }}"></script>
<script src="{{ asset('templateA/js/settings.js') }}"></script>
<script src="{{ asset('templateA/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('templateA/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('templateA/js/dashboard.js') }}"></script>
<script src="{{ asset('templateA/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@yield('javascript')
