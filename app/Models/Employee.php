<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public function services()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }


}
