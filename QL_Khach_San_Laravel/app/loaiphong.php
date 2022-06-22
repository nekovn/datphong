<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiphong extends Model
{
    
    const     CREATED_AT    = 'lp_taoMoi';
    const     UPDATED_AT    = 'lp_capNhat';

    protected $table        = 'loai_phong';
    protected $fillable     = ['lp_ma', 'lp_ten','lp_taoMoi', 'lp_giaBan', 'lp_hinh', 'lp_thongTin', 'lp_capNhat', 'lp_trangThai'];
    
    protected $guarded      = ['lp_ma'];
    protected $primaryKey   = 'lp_ma';

    protected $dates        = ['lp_taoMoi', 'lp_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
