<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'team_id',
        'team_user_id',
        'task_status_id',
        'date'];

        
        public function team_user()
        {
            return $this->belongsTo(TeamUser::class);
        }
        public function team()
        {
            return $this->belongsTo(Team::class);
        }
        public function project()
        {
            return $this->belongsTo(Project::class);
        }
        public function task_status()
        {
            return $this->belongsTo(TaskStatus::class);
        }
  
       
}