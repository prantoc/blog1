<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkFileMeta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_id', 'workfile_id',
    ];

    public function work() {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function workfile() {
        return $this->belongsTo(WorkFile::class, 'workfile_id');
    }
}
