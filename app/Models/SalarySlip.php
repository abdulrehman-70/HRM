<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
    use HasFactory;
    protected $fillable = [
        'basic_salary','incentive', 'house_rent' , 'provident_fund' , 'professional_tax', 'loan','meal_allowance','user_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

  }
