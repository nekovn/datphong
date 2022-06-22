<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khachhang extends Authenticatable
{
    use Notifiable;
    protected $table        = 'khachhang';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_diaChi', 'kh_dienThoai', 'kh_taoMoi', 'kh_capNhat', 'kh_trangThai', 
    ];
    protected $primaryKey   = 'id';
    protected $dates        = [ 'kh_taoMoi', 'kh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    const     CREATED_AT    = 'kh_taoMoi';
    const     UPDATED_AT    = 'kh_capNhat';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
