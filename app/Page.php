<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = "pages";
    public $primaryKey = "id";

    public function scopeActive($query) {
    	return $query->where('is_active', 1);
    }

    public function scopeDeleted($query) {
    	return $query->where('is_active', 0);
    }

    public function kit() {
    	return $this->belongsTo('App\Kit', 'kit_id', 'id');
    }

}
