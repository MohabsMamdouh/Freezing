<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phones_Job extends Model
{
    use HasFactory;

    public function getJob()
    {
        return $this->belongsTo('App\Models\Job', 'phones__job_attaches', 'phone_id', 'job_id');
    }
}
