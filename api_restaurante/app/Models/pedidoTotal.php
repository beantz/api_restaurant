<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidoTotal extends Model
{
    
    protected $table = 'total_pedido';
    
    protected $fillable = ['nome', 'refeição_id', 'bebida_id', 'total'];

    public function bebidas() {
        return $this->belongsTo('App\Models\bebidas', 'bebida_id', 'id');
    }

    public function refeições() {
        return $this->belongsTo('App\Models\refeições', 'refeição_id', 'id');
    }

}
