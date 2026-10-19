<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = [];

    // 🟢 1 Organization มีได้หลาย Staff
    public function staffs() {
        return $this->hasMany(Staff::class, 'organization_id');
    }
}