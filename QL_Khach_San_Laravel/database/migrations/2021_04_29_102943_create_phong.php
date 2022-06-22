<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('p_ma')->autoIncrement()->comment('Mã Phòng');
            $table->string('p_ten', 191)->comment('Tên Phòng # Tên Phòng');
            $table->string('p_danhGia', 50)->default('0;0;0;0;0')->comment('Chất lượng # Chất lượng của Phòng (1-5 sao), định dạng: 1;2;3;4;5');
            $table->timestamp('p_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo Phòng');
            $table->timestamp('p_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật Phòng gần nhất');
            $table->tinyInteger('p_trangThai')->default('2')->comment('Trạng thái # Trạng thái Phòng: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('lp_ma')->comment('Loại Phòng ');
            
            $table->unique(['p_ten']);
            $table->foreign('lp_ma') //cột khóa ngoại là cột `lp_ma` trong table `phong`
                ->references('lp_ma')->on('loai_phong') //cột sẽ tham chiếu đến là cột `lp_ma` trong table `loaiphong`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });DB::statement("ALTER TABLE `phong` comment 'Phong # Phong: hoa, giỏ hoa, vòng hoa, ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phong');
    }
}
