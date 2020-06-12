<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    @include("layouts.header")
    <livewire:styles/>
    <livewire:scripts/>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    @yield("content")

    <script src="{{asset("assets/js/alpine.js")}}"></script>
    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/plugins/chartjs/chart.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/js/waves.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.slimscroll.min.js")}}"></script>
    <script src="{{asset("assets/js/toastr.min.js")}}"></script>
    @yield('custom-scripts')
    <script src="{{asset("assets/js/app.js")}}"></script>
</body>
</html>
