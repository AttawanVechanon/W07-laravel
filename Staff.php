<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    protected $guarded = [];

    // 🟢 เชื่อมกลับไปหา Title
    public function title() {
        return $this->belongsTo(Title::class, 'title_id');
    }

    // 🟢 เชื่อมกลับไปหา Organization
    public function organization() {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}