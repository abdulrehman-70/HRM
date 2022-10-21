<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','leave_type','half_leave_type','start_date','end_date','reason','attachment','status','response'
    ];
      public function user()
      {
        return $this->belongsTo(User::class);
      }
}
