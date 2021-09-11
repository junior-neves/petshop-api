<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    const SPECIES_DOG = 1;
    const SPECIES_CAT = 2;

    public $timestamps = false;
    protected $hidden = ['deleted_at'];
    protected $fillable = [
        'name', 'age', 'species', 'breed', 'owner_id'
    ];
    protected $casts = [
        'age' => 'integer',
        'species' => 'integer'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
