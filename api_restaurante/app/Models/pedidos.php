<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $fillable = ['nome', 'refeição', 'bebida', 'pagamento_id', 'cliente_id'];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function pagamento() {
        return $this->belongsTo('App\Models\pagamento');
    }

    //fazer com q ao criar e atualizar um novo pedido seja possivel fazer alterações de cliente tambem, por um select para inserir o cliente

}
