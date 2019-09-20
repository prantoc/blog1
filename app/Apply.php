<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','subject','up_cv','up_protfolio','mgs',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
