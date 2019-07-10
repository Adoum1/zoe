<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function alertes(){
        return $this->belongsToMany('App\Alerte')->withTimestamps();
    }
}
