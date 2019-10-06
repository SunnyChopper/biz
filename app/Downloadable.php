<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downloadable extends Model
{
    
	protected $table = "downloadables";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

}
