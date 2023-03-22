<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý kho hàng</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/easyui/themes/default/easyui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/easyui/themes/icon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/custom-style.css') }}">

</head>

<body class="easyui-layout">

    {{-- North --}}
    @include('layouts.north')
    {{-- North --}}

    {{-- West --}}
    <div data-options="region:'west',split:true,hideCollapsedContent:false" title="Menu" style="width:200px;">
        <div id="sm"></div>
    </div>
    {{-- West --}}

    {{-- South --}}
    <div data-options="region:'south',border:false" style="padding:10px; text-align:center;">Xây dựng và phát triển &copy; 2023</div>
    {{-- South --}}
    
	@yield('main-content')

</body>

<script type="text/javascript" src="{{ asset('assets/easyui/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/easyui/jquery.easyui.min.js') }}"></script>

<script type="text/javascript">
	function selectMenuItem(id) {
		var menutrees = $('#sm').find(".sidemenu-tree");
		var opts = $('#sm').sidemenu("options");
        menutrees.each(function () {
            var menuItem = $(this);
            menuItem.find("div.tree-node-selected").removeClass("tree-node-selected");
			var node = menuItem.tree("find", id);
			if (node) {
				$(node.target).addClass("tree-node-selected");
				opts.selectedItemId = node.id;
				menuItem.trigger("mouseleave.sidemenu");
			}
        });
	}

	$(document).ready(function() {
		var menuItems = [{
			text: 'Nhập/Xuất kho',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'nhap-kho',
				text: 'Nhập kho'

			},{
				id: 'xuat-kho',
				text: 'Xuất kho'

			}]
		},{
			text: 'Sản phẩm',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'san-pham',
				text: 'Danh sách'
			},{
				id: 'loai-san-pham',
				text: 'Loại sản phẩm'

			},{
				id: 'don-vi-tinh',
				text: 'Đơn vị tính'

			}]
		},
		{
			text: 'Hình thức',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'hinh-thuc',
				text: 'Danh sách'
			}]
		},
		{
			text: 'Kho hàng',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'kho',
				text: 'Danh sách'
			}]
		},
		{
			text: 'Nhà cung cấp',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'nha-cung-cap',
				text: 'Danh sách'

			}]
		},
		{
			text: 'Chương trình',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'chuong-trinh',
				text: 'Danh sách'
			}]
		},
		{
			text: 'Khách hàng',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'khach-hang',
				text: 'Danh sách'
			}]
		},
		{
			text: 'Nhân viên',
			iconCls: 'icon-tip',
			state: 'close',
			children: [{
				id: 'nhan-vien',
				text: 'Danh sách'
			},
			{
				id: 'phan-quyen',
				text: 'Phân quyền'
			}]
		}];

		var $menu = $('#sm').sidemenu({
			data: menuItems,
			border:false,
			onSelect: function(item){
				$.ajax({
					method: "GET",
					url: "{{ route('get-url') }}?name=" + item.id
				})
				.done(function(urlData) {
					window.location = urlData;
				});
			}
		});	
	});

</script>

    @yield('page-js')

</html>