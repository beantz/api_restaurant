<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingredientes_produtos extends Model
{
    protected $fillable = ['refeições_id', 'ingredientes_id'];
}
