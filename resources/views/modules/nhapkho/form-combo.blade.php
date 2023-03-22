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

{{-- Từ nhà cung cấp --}}
<div class="column" style="width: 35%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Từ nhà cung cấp">
        </div>
    </div>
    {{-- Nhà cung cấp --}}
    <div class="row" style="margin-bottom: 10px">
        <select class="easyui-combobox" name="nha_cung_cap_id" label="Nhà cung cấp:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn nhà cung cấp'">
            @foreach ($nhaCungCap as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach    
        </select>
    </div>
    {{-- Nhà cung cấp --}}

    {{-- Hình thức nhập --}}
    <div class="row" style="margin-bottom: 10px">
        <select class="easyui-combobox" name="hinh_thuc_id" label="Hình thức nhập:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn hình thức nhập'">
            @foreach ($hinhThuc as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach
        </select>
    </div>
    {{-- Hình thức nhập --}}

    {{-- Chương trình --}}
    <div class="row" style="margin-bottom: 10px">
        <select class="easyui-combobox" name="chuong_trinh_id" label="Chương trình:" labelPosition="left" style="width:90%;"
            data-options="required:true, missingMessage:'Vui lòng chọn chương trình'">
            @foreach ($chuongTrinh as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach        
        </select>
    </div>
    {{-- Chương trình --}}

</div>
{{-- Từ nhà cung cấp --}}

{{-- Từ khách hàng --}}
<div class="column" style="width: 25%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Từ khách hàng">
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
{{-- Từ khách hàng --}}

{{-- Khác --}}
<div class="column" style="width: 15%">
    <div class="row" style="margin-bottom: 5px">
        <div style="padding: 10px 0 10px 0">
            <input class="easyui-radiobutton" name="chon" label="Khác">
        </div>
    </div></div>
{{-- Khác --}}