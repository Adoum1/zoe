<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockage extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites(){
        return $this->belongsToMany('App\Site')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function conditions(){
        return $this->belongsToMany('App\Conditions')->withTimestamps();
    }
}
