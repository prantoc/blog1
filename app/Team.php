<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img','name', 'degree','admin_id','position',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
