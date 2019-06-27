<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stockages(){
        return $this->belongsToMany('App\Stockage')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function salaries(){
        return $this->belongsToMany('App\Salarie')->withTimestamps();
    }

}
