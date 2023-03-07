<div id="dlg" class="easyui-dialog" style="width:400px" 
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
            @csrf
            <h3>Thông tin chương trình</h3>
            <div style="margin-bottom:10px">
                <input id="ten" 
                       name="ten" 
                       type="text" 
                       class="easyui-textbox" 
                       data-options="required:true,
                                     validType:'length[1,10]',
                                     missingMessage:'Vui lòng nhập tên chương trình',
                                     invalidMessage:'Chứa tối thiểu từ 1 đến 10 ký tự'" 
                       style="width:100%"                       
                       label="Tên chương trình:"
                    >
            </div>
            <div style="margin-bottom:10px">
                <div style="margin-bottom:20px">
                    <input class="easyui-datebox" id="ngay_bat_dau" name="ngay_bat_dau" label="Ngày bắt đầu:" labelPosition="top" style="width:100%;">
                </div>
            </div>
            <div style="margin-bottom:10px">
                <div style="margin-bottom:20px">
                    <input class="easyui-datebox" id="ngay_ket_thuc" name="ngay_ket_thuc" label="Ngày kết thúc:" labelPosition="top" style="width:100%;">
                </div>
            </div>
        </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveChuongTrinh()" style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>