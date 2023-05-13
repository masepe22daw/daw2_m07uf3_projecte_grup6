<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{
    protected $table = 'PARTICIPA';

    protected $primaryKey = ['Passaport', 'CodiProj'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'Passaport',
        'CodiProj',
        'DataInici',
        'DataFinal',
        'Retribucio',
        'ParticipacioProrrogable',
        'ParticipacioPublicacio',
    ];

    public function investigador()
    {
        return $this->belongsTo(Investigador::class, 'Passaport', 'Passaport');
    }

    public function projecte()
    {
        return $this->belongsTo(Projecte::class, 'CodiProj', 'CodiProj');
    }
}
