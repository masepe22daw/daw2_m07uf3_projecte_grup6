<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecte extends Model
{
    protected $table = 'PROJECTES';
    protected $primaryKey = 'CodiProj';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'CodiProj',
        'Nom',
        'DataInici',
        'DataFinal',
        'Classificacio',
        'HoresAssignades',
        'PressupostAssignat',
        'MaxNumInvestigadors',
        'Responsable',
        'Investigacio',
        'Idioma'
    ];
}
