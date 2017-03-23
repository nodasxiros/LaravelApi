<!DOCTYPE html>
<html>
@include('backend.shared._head')
<body>

@include('backend.shared._navbar')

<div id="page-wrapper">
@yield('content')

@include('backend.shared._footer')
</div>

@include('backend.shared._javascript')

</body>
</html>