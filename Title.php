<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    // 🟢 ระบุชื่อตารางตรงๆ ให้ตรงกับที่สร้างไว้ใน Database
    protected $table = 'titles'; // (หรือถ้าใน DB ของคุณตั้งว่า 'title' ให้เปลี่ยนเป็น 'title' ครับ)

    protected $guarded = [];

    public function staffs() {
        return $this->hasMany(Staff::class, 'title_id');
    }
}