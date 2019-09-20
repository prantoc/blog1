<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageImg extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img','slug', 'details','admin_id','title',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
