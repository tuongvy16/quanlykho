<div class="row align-items-start">

    {{-- Kho --}}
    <div style="margin-bottom:10px; width:25%;padding-top: 22px" class="col">
        <select class="easyui-combobox" name="kho_id" label="Chọn kho:" labelPosition="top" style="width:100%;"
            data-options="required:true, missingMessage:'Vui lòng chọn kho'">
            @foreach ($kho as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach                
        </select>
    </div>
    {{-- Kho --}}

    {{-- Từ nhà cung cấp --}}
    <div style="margin-bottom:10px; width: 25%" class="col">
        <input class="easyui-radiobutton" name="chon" label="Từ nhà cung cấp">
        
        {{-- Nhà cung cấp --}}
        <select class="easyui-combobox" name="nha_cung_cap_id" label="Nhà cung cấp:" labelPosition="top" style="width:100%;"
            data-options="required:true, missingMessage:'Vui lòng chọn nhà cung cấp'">
            @foreach ($nhacungcap as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach    
        </select>
        {{-- Nhà cung cấp --}}

        {{-- Hình thức nhập --}}
        <select class="easyui-combobox" name="hinh_thuc_id" label="Hình thức nhập:" labelPosition="top" style="width:100%;"
            data-options="required:true, missingMessage:'Vui lòng chọn hình thức nhập'">
            @foreach ($hinhthuc as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach
        </select>
        {{-- Hình thức nhập --}}

        {{-- Chương trình --}}
        <select class="easyui-combobox" name="chuong_trinh_id" label="Chương trình:" labelPosition="top" style="width:100%;"
            data-options="required:true, missingMessage:'Vui lòng chọn chương trình'">
            @foreach ($chuongtrinh as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach        
        </select>
        {{-- Chương trình --}}

    </div>
    {{-- Từ nhà cung cấp --}}

    {{-- Từ khách hàng --}}
    <div style="margin-bottom:10px;width: 25%" class="col">
        <input class="easyui-radiobutton" name="chon" label="Từ khách hàng">

        {{-- Khách hàng --}}
        <select class="easyui-combobox" name="khach_hang_id" label="Khách hàng:" labelPosition="top" style="width:100%;"
            data-options="required:true, missingMessage:'Vui lòng chọn khách hàng'">
            @foreach ($khachhang as $item)
                <option value="{{ $item->id }}">{{ $item->ten }}</option>
            @endforeach        
        </select>
        {{-- Khách hàng --}}

    </div>
    {{-- Từ khách hàng --}}

    {{-- Khác --}}
    <div style="margin-bottom:10px; width: 25%" class="col">
        <input class="easyui-radiobutton" name="chon" label="Khác">
    </div>
    {{-- Khác --}}

</div>