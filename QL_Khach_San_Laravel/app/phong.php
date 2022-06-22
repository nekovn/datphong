<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    const     CREATED_AT    = 'p_taoMoi';
    const     UPDATED_AT    = 'p_capNhat';

    protected $table        = 'phong';
    protected $fillable     = ['p_ten' ,'p_danhGia', 'p_taoMoi', 'p_capNhat', 'p_trangThai', 'lp_ma'];
    protected $guarded      = ['p_ma'];

    protected $primaryKey   = 'p_ma';

    protected $dates        = ['p_taoMoi', 'p_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
     public function loaisanpham()
    {
        return $this->belongsTo('ApplLoai', 'lp_ma', 'lp_ma');
    }

    // public function hinhanhlienquan()
    // {
    //     return $this->hasMany('App\HinhAnh', 'sp_ma', 'sp_ma');
    // }
}
