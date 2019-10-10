<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    
	protected $table = "kits";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

    public function downloadables() {
    	return $this->hasMany('App\Downloadable', 'id', 'kit_id');
    }

}
