<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecte extends Model
{
    protected $table = 'PROJECTES';

    protected $primaryKey = 'CodiProj';

    public $incrementing = false;

    protected $keyType = 'string';

  
    public function responsable()
    {
        return $this->belongsTo(Investigador::class, 'PassaportResponsable', 'Passaport');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'acceso', 'CodiProj', 'Email')
                    ->withPivot('Tipo');
    }
}
