<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidoTotal extends Model
{
    //
    protected $table = 'total_pedido';
    
    protected $fillable = ['nome', 'refeição_id', 'bebida_id', 'total'];

}
