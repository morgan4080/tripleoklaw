<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{

	protected $primaryKey = 'practice_id';
    public function team()
    {
        return $this->belongsToMany('App\Admin\Team');
    }
}
