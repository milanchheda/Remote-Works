<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.header')

<body class="@yield('bodyClasses')">
@yield('body')

@include('layouts.partials.footer')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
