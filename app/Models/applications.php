<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;

    public function career()
    {
        return $this->belongsTo('App\Models\AvailableCareers');
    }
}
