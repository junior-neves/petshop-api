<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }


}
