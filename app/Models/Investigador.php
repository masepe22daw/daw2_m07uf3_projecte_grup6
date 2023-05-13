<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    protected $table = 'INVESTIGADORS';

    protected $primaryKey = 'Passaport';

    public $incrementing = false;

    protected $keyType = 'string';

    public function proyectos_responsable()
    {
        return $this->hasMany(Projecte::class, 'Nom');
    }

    public function proyectos_participante()
    {
        return $this->belongsToMany(Projecte::class, 'PARTICIPA', 'Passaport', 'CodiProj')
                    ->withPivot('DataInici', 'DataFinal', 'Retribucio', 'ParticipacioProrrogable', 'ParticipacioPublicacio');
    }
}
