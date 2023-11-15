<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'id_alberca','nombre', 'ph', 'cloro', 'cepillo', 'filtro', 'observaciones', 'id_estado'];

/**
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
*/
    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }

    public  function albercas(){
        return $this->hasOne('App\Models\Alberca', 'id', 'id_alberca');
    }

    public  function estados(){
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
}
