<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }
}
