<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participa extends Model
{
    protected $table = 'PARTICIPA';

    protected $guarded = [];
    protected $primaryKey = ['Passaport', 'CodiProj'];


    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'Passaport',
        'CodiProj',
        'DataInici',
        'DataFinal',
        'Retribucio',
        'ParticipacioProrrogable',
        'ParticipacioPublicacio',
    ];

    protected function getCompositeKeyAttribute()
    {
        return $this->Passaport . '-' . $this->CodiProj;
    }

    public function investigador()
    {
        return $this->belongsTo(Investigador::class, 'Passaport', 'Passaport');
    }

    public function projecte()
    {
        return $this->belongsTo(Projecte::class, 'CodiProj', 'CodiProj');
    }
}


