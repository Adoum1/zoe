<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function especes(){
        return $this->belongsToMany('App\Especes')->withTimestamps();
    }

}
