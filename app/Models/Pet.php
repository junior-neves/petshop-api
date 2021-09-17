<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable = [
        'name', 'age', 'species_id', 'breed', 'owner_id'
    ];
    protected $casts = [
        'age' => 'integer',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
}
