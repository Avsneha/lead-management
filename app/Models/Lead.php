<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    public $timestamps = false; // we handle date_added & last_updated manually

    protected $fillable = [
        'name', 'email', 'phone', 'status', 'date_added', 'last_updated'
    ];
}
