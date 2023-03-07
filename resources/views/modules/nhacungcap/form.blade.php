<div id="dlg" class="easyui-dialog" style="width:400px" 
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
            @csrf
            <h3>Thông tin nhà cung cấp</h3>
            <div style="margin-bottom:10px">
                <input id="ten" 
                       name="ten" 
                       type="text" 
                       class="easyui-textbox" 
                       data-options="required:true,
                                     validType:'length[1,10]',
                                     missingMessage:'Vui lòng nhập tên',
                                     invalidMessage:'Chứa tối thiểu từ 1 đến 10 ký tự'" 
                       style="width:100%"                       
                       label="Tên nhà cung cấp:"
                    >
            </div>
            <div style="margin-bottom:10px">

                <input id="dien_thoai" 
                       name="dien_thoai" 
                       type="text" 
                       class="easyui-textbox" 
                       data-options="required:true,
                                     validType:'length[1,10]',
                                     missingMessage:'Vui lòng nhập điện thoại',
                                     invalidMessage:'Chứa tối thiểu từ 1 đến 10 ký tự'" 
                       style="width:100%"                       
                       label="Điện thoại:"
                    >
            </div>
        </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveNhaCungCap()" style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>