<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkFile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_id', 'file','file_type','admin_id','details','title',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }

     public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }
}
