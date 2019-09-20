<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'details','admin_id','title',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
