<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_name','candidate_email','employer_name','employer_email',
        'date','interview_type','designation_id','interview_status_id','meeting_link','remarks'
];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function status()
    {
        return $this->belongsTo(InterviewStatus::class,'interview_status_id');
    }
}
