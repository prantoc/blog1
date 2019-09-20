<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','admin_id','title','img',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
