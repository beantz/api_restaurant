<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingredientes extends Model {

    protected $fillable = ['nome'];

    public function refeições() {

        return $this->belongsToMany('App\Models\refeições', 'refeições_ingredientes');

    }
}
