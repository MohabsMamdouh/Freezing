<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Job
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'feedback',
        'status',
    ];

    public function Jobs()
    {
        return $this->belongsToMany('App\Models\Job', 'feeds_jobs', 'feed_id', 'job_id');
    }
}
