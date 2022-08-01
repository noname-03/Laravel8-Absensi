<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassEducation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
