<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{

    protected $table = 'tutoriais';

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    //
}
