<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('kh_ma')->autoIncrement();
            $table->string('kh_taiKhoan', 50)->nullable($value = true);
            $table->string('kh_matKhau', 256)->nullable($value = true);
            $table->string('kh_hoTen', 100)->comment('Họ tên # Họ tên');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác');
            $table->string('kh_email', 100)->nullable($value = true);
            $table->string('kh_diaChi', 250)->comment('Địa chỉ # Địa chỉ');
            $table->string('kh_dienThoai', 11)->comment('Điện thoại # Điện thoại');
            $table->string('kh_ghinhodangnhap')->nullable();
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất');        
            $table->unique(['kh_taiKhoan', 'kh_email', 'kh_dienThoai']);
        });
        DB::statement("ALTER TABLE `khachhang` comment 'khách hàng # khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
