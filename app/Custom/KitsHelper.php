<?php

namespace App\Custom;

use App\ImportKit;

class KitsHelper {
	
	public static function hasUserImported($user_id, $kit_id) {
		if (ImportKit::where('user_id', $user_id)->where('kit_id', $kit_id)->active()->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

}