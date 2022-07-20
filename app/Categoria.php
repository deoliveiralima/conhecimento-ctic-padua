<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{


    protected $table = 'categorias';

    public function tutoriais()
    {
        return $this->hasMany('App\Tutorial');
    }
    //
}
