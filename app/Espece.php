<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes(){
        return $this->belongsToMany('App\Classe')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function embranchements(){
        return $this->belongsToMany('App\Embranchement')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function familles(){
        return $this->belongsToMany('App\Famille')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres(){
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ordres(){
        return $this->belongsToMany('App\Ordre')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lots(){
        return $this->belongsToMany('App\Lot')->withTimestamps();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function alertes(){
        return $this->belongsToMany('App\Alerte')->withTimestamps();
    }

}
