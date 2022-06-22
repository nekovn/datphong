<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_phong', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('lp_ma')->autoIncrement()->comment('Mã loại Phòng');
            $table->string('lp_ten', 50)->comment('Tên loại # Tên loại Phòng');
            $table->unsignedInteger('lp_giaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của loại Phòng');
             $table->string('lp_hinh', 200)->comment('Hình đại diện # Hình đại diện của loại Phòng');
            $table->text('lp_thongTin')->comment('Thông tin # Thông tin về loại Phòng');
            $table->timestamp('lp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại Phòng');
            $table->timestamp('lp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật loại Phòng gần nhất');
            $table->tinyInteger('lp_trangThai')->default('2')->comment('Trạng thái # Trạng thái loại Phòng: 1-khóa, 2-khả dụng');  
            $table->unique(['lp_ten']);
        }); DB::statement("ALTER TABLE `loai_phong` comment 'Loại sản phẩm # Loại sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_phong');
    }
}
