<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
    use Notifiable;
    protected $table        = 'nhanvien';
    protected $guard = 'admin';
    const     CREATED_AT    = 'nv_taoMoi';
    const     UPDATED_AT    = 'nv_capNhat';
    protected $primaryKey   = 'id';
    protected $dates        = [ 'nv_taoMoi', 'nv_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nv_hoTen', 'nv_gioiTinh', 'nv_email', 'nv_diaChi', 'nv_dienThoai', 'nv_taoMoi', 'nv_capNhat', 'nv_trangThai', 'q_ma'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
