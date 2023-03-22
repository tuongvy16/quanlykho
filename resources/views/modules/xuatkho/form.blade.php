<div id="dlg" class="easyui-dialog" style="width:1000px; height: 550px;"
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">

    {{-- Form phiếu xuất --}}
    <form id="fm" method="POST" novalidate style="margin:0;padding:0px 20px;height:100%">
        @csrf
        <div class="row" style="height: 35%">
                @include('modules.xuatkho.form-combo')
        </div>
        <div class="row" >
            <p style="margin: 5px">Danh sách sản phẩm xuất kho:     
                <a href="javascript:void(0)" onclick="newXuatSanPham()">Chọn sản phẩm</a>
            </p>
            @include('modules.xuatkho.form-san-pham-xuat')

            <table id="dg-san-pham-xuat" class="easyui-datagrid" style="height:200px;width: 950px"></table>

            <input class="easyui-textbox" label="Ghi chú:" multiline="true" labelPosition="top" data-options="prompt:'Nội dung ghi chú'" style="width:100%;height:65px;">

        </div>
    </form>
    {{-- Form phiếu nhập --}}

</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveXuatKho()"
        style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
        onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>

<script type="text/javascript">
    var url;

    function newXuatSanPham(){
        $('#dlg-san-pham-xuat').dialog('open').dialog('center').dialog('setTitle','Sản phẩm');
        $('#fm-san-pham-xuat').form('clear');
    }    
    
</script>

<script type="text/javascript">
    function myformatter(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        return (d < 10 ? ('0' + d) : d) + '-' + (m < 10 ? ('0' + m) : m) + '-' + y;
    }

    function myparser(s) {
        if (!s) return new Date();
        var ss = (s.split('-'));
        var d = parseInt(ss[0], 10);
        var m = parseInt(ss[1], 10);
        var y = parseInt(ss[2], 10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
            return new Date(y, m - 1, d);
        } else {
            return new Date();
        }
    }
</script>



