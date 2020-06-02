<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $primaryKey = 'team_id';
	
     public function practices()
    {
        return $this->belongsToMany('App\Admin\Practice');
    }
}
