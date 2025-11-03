<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadHistory extends Model
{
    public $timestamps = false;
     protected $table = 'lead_history';
    protected $fillable = ['lead_id', 'old_status', 'new_status', 'changed_by', 'changed_at'];

    public function lead() {
        return $this->belongsTo(Lead::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
