<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function Task()
    {
    	return $this->hasOne('App\Task');
    }
}
