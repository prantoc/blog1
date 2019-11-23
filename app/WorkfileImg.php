<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkfileImg extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id','details', 'workfile_id','file','file_type',
    ];

    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function workfile() {
        return $this->belongsTo(WorkFile::class, 'workfile_id');
    }

     public function workfiletype() {
        return $this->belongsTo(workfileType::class, 'file_type');
    }
}
