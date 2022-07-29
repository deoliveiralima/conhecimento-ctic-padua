<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Tutorial;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\DB;

class PublicoController extends Controller
{
    public function __construct()
  {
    //its just a dummy data object.
    $tutoriais = Tutorial::orderBy('titulo')->get();

    View::share('tutoriais_sidebar', $tutoriais);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tutorial = Tutorial::latest()->first();

        return view('publico.index', compact('tutorial'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tutorial_url)
    {

        $tutorial =  Tutorial::where('url', $tutorial_url)->first();

        return view('publico.show', compact('tutorial'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        
    }

    public function pesquisa(Request $request)
    {
        
        //$tutoriais = DB::table('tutoriais')->where('titulo', 'LIKE', '%'.$request->termo.'%')->get();

        $tutoriais = DB::table('tutoriais')->where('titulo', 'like',  "%{$request->termo}%")->get();
       
        

        return view('publico.pesquisa', compact('tutoriais'));

        //
    }
}
