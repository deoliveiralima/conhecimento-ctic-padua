<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoriais = Tutorial::all();
        
        return view('editor.tutorial.index', compact('tutoriais'));
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \App\Categoria::all();

        return view('editor.tutorial.create', compact('categorias'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'titulo' => 'required|unique:tutoriais|max:255',
            

        ], $mensagens);
        

        

        $tutorial = new Tutorial();
        $tutorial->titulo = $request->titulo;
        $tutorial->solucao = $request->solucao;
        $tutorial->editor_id = Auth::guard('editor')->user()->id;
        $tutorial->url = str_replace(" ", "-", strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) ));

        $categoria = \App\Categoria::find($request->categoria);
        
        $categoria->tutoriais()->save($tutorial);

        return redirect()->route('edicao.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {

        return view('editor.tutorial.create', compact('tutorial'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        $categorias = \App\Categoria::all();
        return view('editor.tutorial.create', compact('tutorial', 'categorias'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
    {
        

        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'titulo' => 'required|max:255',
            

        ], $mensagens);
    
        $tutorial->titulo = $request->titulo;
        $tutorial->solucao = $request->solucao;
        $tutorial->editor_id = Auth::guard('editor')->user()->id;
        $tutorial->url = str_replace(" ", "-", strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($request->titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) ));

        $categoria = \App\Categoria::find($request->categoria);
        $categoria->tutoriais()->save($tutorial);

        return redirect()->route('edicao.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return redirect()->route('edicao.index');

    }

    public function publicoIndex(){
        $tutoriais = Tutorial::all();
        
        return view('publico.index', $tutoriais);
    }

    public function publicoPesquisa(){

        $tutoriais = Tutorial::all();

        return view('publico.index', $tutoriais);
    }
}
