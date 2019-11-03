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
         'admin_id','title','slug','img',
    ];

    //  public function area() {
    //     return $this->belongsTo(Area::class, 'location');
    // }

    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function workfilemeta() {
        return $this->belongsTo(WorkFileMeta::class, 'work_id');
    }
    public function workfileImg() {
        return $this->belongsTo(WorkfileImg::class, 'workfile_id');
    }
}
