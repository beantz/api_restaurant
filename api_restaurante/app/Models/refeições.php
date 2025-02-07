<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class refeições extends Model
{

    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['nome', 'preço'];

    public function ingredientes() {

        return $this->belongsToMany('App\Models\ingredientes', 'refeições_ingredientes', 'refeições_id', 'ingredientes_id');

    }

}
