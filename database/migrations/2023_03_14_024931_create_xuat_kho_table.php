<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuatKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuat_kho', function (Blueprint $table) {
            $table->id();
            $table->integer('kho_id')->nullable();
            $table->integer('hinh_thuc_id')->nullable();
            $table->integer('chuong_trinh_id')->nullable();
            $table->integer('khach_hang_id')->nullable();
            $table->integer('nhan_vien_xuat_id');
            $table->string('ghi_chu')->nullable();
            $table->date('ngay_duyet')->nullable();
            $table->integer('trang_thai')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuat_kho');
    }
}
