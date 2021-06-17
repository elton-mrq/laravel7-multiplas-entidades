<?php

namespace App;

use App\Marca;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['descricao', 'preco', 'cor', 'peso', 'marca_id'];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
