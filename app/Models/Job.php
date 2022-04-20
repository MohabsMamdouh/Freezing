<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'email',
        'description',
        'status',
    ];


    public function getPhones()
    {
        return $this->belongsToMany('App\Models\Phones_Job', 'phones__job_attaches', 'job_id', 'phone_id');
    }

    public function getAddress()
    {
        return $this->hasOne('App\Models\Address_Job', 'job_id', 'id');
    }

    public function Feedbacks()
    {
        return $this->belongsToMany('App\Models\feedback', 'feeds_jobs', 'job_id', 'feed_id');
    }

    public function getTechnical()
    {
        return $this->belongsToMany('App\Models\User', 'timings', 'job_id', 'user_id');
    }
}
