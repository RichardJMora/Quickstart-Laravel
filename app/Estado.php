<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function Task()
    {
    	return $this->hasOne('App\Task');
    }
}
