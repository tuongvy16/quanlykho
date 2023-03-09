<div id="dlg" class="easyui-dialog" style="width:1000px; height: 550px;"
    data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">

    {{-- Form phiếu nhập --}}
    <form id="fm" method="POST" novalidate style="margin:0;padding:10px 20px">
        @csrf
        
        @include('modules.nhapkho.form-combo')

        @include('modules.nhapkho.danh-sach-san-pham')
        
        <div style="padding: 20px">
            <input class="easyui-textbox" label="Ghi chú:" multiline="true" labelPosition="top" style="width:100%;height:80px;">
        </div>
    </form>
    {{-- Form phiếu nhập --}}

</div>

<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveNhapKho()"
        style="width:90px">Lưu</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
        onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Huỷ bỏ</a>
</div>

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

