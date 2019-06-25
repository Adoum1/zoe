<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function especes(){
        return $this->belongsToMany('App\Espece')->withTimestamps();
    }
}
