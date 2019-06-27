<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salarie extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites(){
        return $this->belongsToMany('App\Site')->withTimestamps();
    }
}
