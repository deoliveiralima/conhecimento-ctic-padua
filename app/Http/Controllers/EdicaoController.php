<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutorial;

use App\Categoria;

class EdicaoController extends Controller
{

    public function index(){
        
        $tutoriais = Tutorial::orderBy('titulo')->get();
        $categorias = Categoria::orderBy('nome')->get();

        return view('editor.index', compact('tutoriais', 'categorias'));

    }
    //
}
