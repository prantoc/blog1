<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressMap extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address','lat','long','phone','email','img',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }
}
