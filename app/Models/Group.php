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
}
