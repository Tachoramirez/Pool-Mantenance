<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @property Alberca[] $albercas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    /*
    static $rules = [
        'id_alberca' => 'required',
		'name' => 'required',
		'email' => 'required',
        'num_cel' => 'required',
        'vigencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_alberca','name','email', 'num_cel', 'vigencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function albercas()
    {
        return $this->hasMany('App\Models\Alberca', 'id', 'id_cliente');
    }
    

}