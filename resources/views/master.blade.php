<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/easyui/themes/default/easyui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/easyui/themes/icon.css') }}">
</head>
<body class="easyui-layout">

    @include('layouts.north')

    @include('layouts.west')

	@yield('main-content')

</body>

<script type="text/javascript" src="{{ asset('assets/easyui/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/easyui/jquery.easyui.min.js') }}"></script>

</html>