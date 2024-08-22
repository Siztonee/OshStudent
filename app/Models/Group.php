<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function curator()
    {
        return $this->belongsTo(User::class, 'curator_id')->whereIn('role', ['teacher', 'admin']);
    }

    public function headman()
    {
        return $this->belongsTo(User::class, 'headman_id')->where('role', 'student');
    }
}
