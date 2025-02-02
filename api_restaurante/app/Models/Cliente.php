<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nome', 'cpf', 'quantidade_pedidos', 'cupons'];

    public function pedidos() {
        return $this->hasOne('App\Models\pedidos');
    }
}
