<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\Editor;
use Illuminate\Support\Facades\Hash;

class AdministracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $editores = Editor::all();
        $admins = Admin::all();
        return view('administracao.index', compact('editores', 'admins'));
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEditor()
    {
        return view('administracao.editor.create');
        //
    }

    public function createAdmin()
    {
        return view('administracao.admin.create');
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEditor(Request $request)
    {
        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'nome' => 'required|max:255',
            'login' => 'required|max:255',
            

        ], $mensagens);

        $admin = Editor::create([
            'nome' => $request['nome'],
            'login' => $request['login'],
            'password' => Hash::make($request['senha']),
        ]);
        return redirect()->intended('administracao/');

        //
    }

    public function storeAdmin(Request $request)
    {
        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'nome' => 'required|max:255',
            'login' => 'required|max:255',
            

        ], $mensagens);
        $admin = new Admin;
        $admin->nome = $request['nome'];
        $admin->login = $request['login'];
        $admin->password = Hash::make($request['senha']);


        $admin->save();
        return redirect()->intended('administracao/');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEditor($id)
    {
        $editor = Editor::find($id);

        return view('administracao.editor.create', compact('editor'));
        //
    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);

        return view('administracao.admin.create', compact('admin'));
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEditor(Request $request, Editor $editor)
    {

        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'nome' => 'required|max:255',
            'login' => 'required|max:255',
            

        ], $mensagens);

        $editor->nome = $request->nome;
        $editor->login = $request->login;

        if(!empty($request->senha))
            $editor->password = Hash::make($request->senha);
        
        $editor->save();
        
        return redirect()->intended('administracao/');

        //
    }

    public function updateAdmin(Request $request, Admin $admin)
    {

        $mensagens = [
            'required' => "O :attribute é obrigatório"
        ];
        $validate = $request->validate([
            'nome' => 'required|max:255',
            'login' => 'required|max:255',
            

        ], $mensagens);

        $admin->nome = $request->nome;
        $admin->login = $request->login;

        if(!empty($request->senha))
            $admin->password = Hash::make($request->senha);
        
        $admin->save();
        
        return redirect()->intended('administracao/');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEditor(Editor $editor)
    {

        $editor->delete();

        return redirect(route('administracao.index'));

        //
    }

    public function destroyAdmin(Admin $admin)
    {

        $admin->delete();
        
        return redirect(route('administracao.index'));
        //
    }
}
