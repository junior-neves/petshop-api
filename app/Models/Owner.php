<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable = [
        'name', 'phone'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
