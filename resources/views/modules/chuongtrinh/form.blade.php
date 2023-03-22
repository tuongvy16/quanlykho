<div id="dlg" class="easyui-dialog" style="width:400px" 
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
            @csrf

            <div style="margin-bottom:10px">
                <input  id="ten" 
                        class="easyui-textbox" 
                        name="ten" 
                        type="text" 
                        data-options="required:true,
                                        validType:'length[1,255]',
                                        missingMessage:'Vui lòng nhập tên chương trình',
                                        invalidMessage:'Chứa tối thiểu từ 1 đến 255 ký tự'" 
                        style="width:100%"                       
                        labelPosition="top"
                        label="Tên chương trình:"
                    >
            </div>
            <div style="margin-bottom:10px">
                <input  id="ngay_bat_dau" 
                        class="easyui-datebox"
                        name="ngay_bat_dau" 
                        data-options="formatter:myformatter,
                                        parser:myparser, 
                                        required: true,
                                        missingMessage:'Vui lòng nhập ngày bắt đầu',
                                        invalidMessage:'Ngày không hợp lệ'" 
                        style="width:100%;"
                        labelPosition="top" 
                        label="Ngày bắt đầu:" 
                >
            </div>
            <div style="margin-bottom:10px">
                <input  id="ngay_ket_thuc" 
                        class="easyui-datebox"                        
                        name="ngay_ket_thuc" 
                        data-options="formatter:myformatter,
                                        parser:myparser, 
                                        required: true,
                                        missingMessage:'Vui lòng nhập ngày kết thúc',
                                        invalidMessage:'Ngày không hợp lệ',"
                        style="width:100%;"
                        labelPosition="top" 
                        label="Ngày kết thúc:" 
                >
            </div>
        </form>
</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveChuongTrinh()" style="width:90px">Lưu</a>
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