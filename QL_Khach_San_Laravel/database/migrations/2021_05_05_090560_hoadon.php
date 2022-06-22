<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('hd_ma')->autoIncrement()   ;
            $table->unsignedTinyInteger('p_ma');
            $table->unsignedTinyInteger('kh_ma');
            $table->unsignedTinyInteger('nv_ma');
            $table->integer('hd_gia')->nullable($value = true);
            $table->timestamp('hd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('hd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('hd_trangThai')->default('2')->comment('Trạng thái # Trạng thái Phòng: 1-khóa, 2-khả dụng');
            $table->unique(['hd_ma']);
            $table->foreign('p_ma') 
                ->references('p_ma')->on('phong') 
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('kh_ma') 
                ->references('kh_ma')->on('khachhang') 
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('nv_ma') 
                ->references('nv_ma')->on('nhanvien') 
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
           
        });
        DB::statement("ALTER TABLE `hoadon` comment 'hoadon#  quản lý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
}
