<div id="dlg" class="easyui-dialog" style="width:400px" 
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
            @csrf

            <div style="margin-bottom:10px">
                <input id="ten" 
                       name="ten" 
                       type="text" 
                       class="easyui-textbox" 
                       data-options="required:true,
                                     validType:'length[1,255]',
                                     missingMessage:'Vui lòng nhập tên sản phẩm',
                                     invalidMessage:'Chứa tối thiểu từ 1 đến 10 ký tự'" 
                       style="width:100%"         
                       labelPosition="top"              
                       label="Tên sản phẩm:"
                    >
            </div>
            
            <div style="margin-bottom:10px">
                <select class="easyui-combobox" name="loai_san_pham_id []" label="Loại sản phẩm:" labelPosition="top" style="width:100%;"
                    data-options="required:true, missingMessage:'Vui lòng chọn loại sản phẩm', multiple:true">
                    @foreach ($loaiSanPham as $item)
                        <option value="{{ $item->id }}">{{ $item->ten }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:10px">
                <select class="easyui-combobox" 
                        name="don_vi_tinh_id" 
                        data-options="required:true,
                                        missingMessage:'Vui lòng chọn đơn vị tính'" 
                        label="Đơn vị tính:" 
                        labelPosition="top" 
                        style="width:100%;">
                        @foreach ($donViTinh as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                </select>
            </div>

        </form>
</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveSanPham()" style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>