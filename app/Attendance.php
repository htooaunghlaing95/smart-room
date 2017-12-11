<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
      'user_id', 'time','date', 'present',
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
