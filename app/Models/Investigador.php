<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    protected $table = 'INVESTIGADORS';
    protected $primaryKey = 'Passaport';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Passaport',
        'CodiAssegMèdica',
        'NomCognoms',
        'Especialitat',
        'Telefon',
        'Adreça',
        'Ciutat',
        'País',
        'Email',
        'Titulacio',
    ];
}
