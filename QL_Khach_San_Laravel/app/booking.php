<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{


    const     CREATED_AT    = 'bk_taoMoi';
    const     UPDATED_AT    = 'bk_capNhat';

    protected $table        = 'booking';
    protected $fillable     = ['bk_ma','p_ma', 'kh_ma','bk_maLoaiPhong','nv_ma','bk_thoiGianBatDau','bk_thoiGianKetThuc','bk_trangThai','bk_gia','bk_taoMoi','bk_capNhat'];

    protected $guarded      = ['bk_ma'];
    protected $primaryKey   = 'bk_ma';

    protected $dates        = ['bk_thoiGianBatDau', 'bk_thoiGianKetThuc','bk_taoMoi', 'bk_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}

