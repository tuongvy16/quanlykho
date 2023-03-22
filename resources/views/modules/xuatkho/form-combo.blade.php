{{-- Kho --}}
<div class="column" style="width: 25%;padding-top: 70px">
    <select class="easyui-combobox" name="kho_id" label="Chọn kho:" labelPosition="left" style="width:100%;"
        data-options="required:true, missingMessage:'Vui lòng chọn kho'">
        @foreach ($kho as $item)
            <option value="{{ $item->id }}">{{ $item->ten }}</option>
        @endforeach                
    </select>
</div>
{{-- Kho --}}

{{-- Chạy chương trình --}}
<div class="column" style="width: 35%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Chạy chương trình">
        </div>
    </div>
    {{-- Chương trình --}}
    <div class="row" style="margin-bottom: 10px">
        <select class="easyui-combobox" name="chuong_trinh_id" label="Nhà đích xuất:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn chương trình'">
            @foreach ($chuongTrinh as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach        
        </select>
    </div>
    {{-- Chương trình --}}

    {{-- Hình thức xuất --}}
    <div class="row" style="margin-bottom: 10px">
        <select class="easyui-combobox" name="hinh_thuc_id" label="Hình thức xuất:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn hình thức xuất'">
            @foreach ($hinhThuc as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach
        </select>
    </div>
    {{-- Hình thức xuất --}}


</div>
{{-- Chạy chương trình --}}

{{-- Trả khách hàng --}}
<div class="column" style="width: 25%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Trả khách hàng">
        </div>
    </div>
    {{-- Khách hàng --}}
    <div class="row" style="margin-bottom: 10px" >
        <select class="easyui-combobox" name="khach_hang_id" label="Khách hàng:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn khách hàng'">
            @foreach ($khachHang as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach        
        </select>
    </div>
    {{-- Khách hàng --}}
</div>
{{-- Trả khách hàng --}}

{{-- Khác --}}
<div class="column" style="width: 15%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Khác">
        </div>
    </div></div>
{{-- Khác --}}