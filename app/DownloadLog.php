<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    
	protected $table = "download_logs";
    public $primaryKey = "id";

    public function download() {
    	return $this->belongsTo('App\Downloadable', 'download_id', 'id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
