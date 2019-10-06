<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportKit extends Model
{
    
	protected $table = "import_kits";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function kit() {
    	return $this->belongsTo('App\Kit', 'kit_id', 'id');
    }

}
