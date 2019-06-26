<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conditions extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stockages(){
        return $this->belongsToMany('App\Stockage')->withTimestamps();
    }
}
