<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    const     CREATED_AT    = 'hd_taoMoi';
    const     UPDATED_AT    = 'hd_capNhat';

    protected $table        = 'hoadon';
    protected $fillable     = ['hd_ma', 'p_ma','kh_ma','nv_ma','hd_taoMoi', 'hd_capNhat','hd_trangThai' ];

    protected $guarded      = ['hd_ma'];
    protected $primaryKey   = 'hd_ma';

    protected $dates        = ['hd_taoMoi', 'hd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
