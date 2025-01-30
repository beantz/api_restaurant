<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $fillable = ['nome', 'refeição', 'bebida', 'pagamento_id', 'cliente_id'];
}
