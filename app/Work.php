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
        'slug','admin_id','title','img','position',
    ];

    //  public function workfile() {
    //     return $this->belongsTo(WorkFile::class, 'slug');
    // }
     public function workfiles(){
        return $this->hasMany('App\WorkFile');
    }
}
