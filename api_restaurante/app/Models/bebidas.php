<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bebidas extends Model
{

    use HasFactory;

    protected $fillable = ['nome', 'preço'];

    use SoftDeletes;

    public function total_pedido() {

        return $this->hasOne('App\Models\pedidoTotal', 'bebida_id', 'id');

    }
}
