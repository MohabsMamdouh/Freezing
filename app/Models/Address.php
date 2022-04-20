<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'Addresses_attaches', 'address_id', 'attach_id');
    }
}
