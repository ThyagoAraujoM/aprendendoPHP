<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Para dizer que o tipo de items é um array e não uma string
    // Uma das poucas alterações que precisam ser feitas
    // no models para o entendimento de alguns arquivos
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public function user()
    {
        // passa falando que pertence a alguém e é para um único usuário
        return $this->belongsTo("App\Models\User");
    }

    public function users()
    {
        return $this->belongsToMany("App\Models\User");
    }
}
