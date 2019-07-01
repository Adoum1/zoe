<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
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
    public function especes(){
        return $this->belongsToMany('App\Espece')->withTimestamps();
    }


}
