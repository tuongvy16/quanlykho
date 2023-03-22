<div id="dlg" class="easyui-dialog" style="width:400px" 
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
            @csrf

            <div style="margin-bottom:10px">
                <input  id="ten_dang_nhap" 
                        class="easyui-textbox" 
                        name="ten_dang_nhap" 
                        type="text" 
                        data-options="required:true,
                                        validType:'length[1,255]',
                                        missingMessage:'Vui lòng nhập tên đăng nhập',
                                        invalidMessage:'Chứa tối thiểu từ 1 đến 255 ký tự'" 
                        style="width:100%"                       
                        labelPosition="top"
                        label="Tên đăng nhập:"
                    >
            </div>
            <div style="margin-bottom:10px">
                <input  id="mat_khau" 
                        class="easyui-textbox"
                        name="mat_khau" 
                        data-options="  required: true,
                                        missingMessage:'Vui lòng nhập mật khẩu',
                                        invalidMessage:'Mật khẩu không hợp lệ'" 
                        style="width:100%;"
                        labelPosition="top" 
                        label="Mật khẩu:" 
                >
            </div>
            <div style="margin-bottom:10px">
                <input  id="ho_ten" 
                        class="easyui-textbox"                        
                        name="ho_ten" 
                        data-options="  required: true,
                                        missingMessage:'Vui lòng nhập họ tên',
                                        invalidMessage:'Họ tên không hợp lệ',"
                        style="width:100%;"
                        labelPosition="top" 
                        label="Họ tên:" 
                >
            </div>
            <div style="margin-bottom:10px">
                <input  id="ngay_sinh" 
                        class="easyui-datebox"
                        name="ngay_sinh" 
                        data-options="formatter:myformatter,
                                        parser:myparser, 
                                        required: true,
                                        missingMessage:'Vui lòng nhập ngày sinh',
                                        invalidMessage:'Ngày không hợp lệ'" 
                        style="width:100%;"
                        labelPosition="top" 
                        label="Ngày sinh:" 
                >
            </div>
            <div style="margin-bottom:10px">
                <input  id="dien_thoai" 
                        class="easyui-textbox"                        
                        name="dien_thoai" 
                        data-options="  required: true,
                                        missingMessage:'Vui lòng nhập điện thoại',
                                        invalidMessage:'Điện thoại không hợp lệ',"
                        style="width:100%;"
                        labelPosition="top" 
                        label="Điện thoại:" 
                >
            </div>
            <div style="margin-bottom:10px">
                <input  id="email" 
                        class="easyui-textbox"                        
                        name="email" 
                        data-options="  required: true,
                                        validType:'email',
                                        missingMessage:'Vui lòng nhập email',
                                        invalidMessage:'Email không hợp lệ',"
                        style="width:100%;"
                        labelPosition="top" 
                        label="Email:" 
                >
            </div>
            <div style="margin-bottom:10px">
            <select class="easyui-combobox" name="phan_quyen_id" label="Phân quyền:" labelPosition="top" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn phân quyền'">
                @foreach ($phanQuyen as $item)
                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                @endforeach
            </select>
            </div>
        </form>
</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveNhanVien()" style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>

<script type="text/javascript">
    function myformatter(date){
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        var d = date.getDate();
        return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
    }
    function myparser(s){
        if (!s) return new Date();
        var ss = (s.split('-'));
        var d = parseInt(ss[0],10);
        var m = parseInt(ss[1],10);
        var y = parseInt(ss[2],10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
            return new Date(y,m-1,d);
        } else {
            return new Date();
        }
    }
</script>