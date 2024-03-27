<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function index(Request $request) {
        
        $pesquisar = $request->pesquisar;
        $findUsuario = $this->user->getUsuarioPesquisarIndex(search: $pesquisar ?? '');
        
        return view('pages.usuarios.paginacao', compact('findUsuario'));
    }

    public function delete(UsuarioFormRequest $request) {
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]); 
    }

    public function cadastrarUsuario(UsuarioFormRequest $request) {
        if($request->method() == 'POST') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Gravado com sucesso!');
            return redirect()->route('usuario.index');
        }

        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(UsuarioFormRequest $request, $id) {
        if($request->method() == 'PUT') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
           
            $buscarRegistro = User::find($id);
            $buscarRegistro->update($data);

            Toastr::success('Atualizado com sucesso!');
            return redirect()->route('usuario.index');
        }

        $findUsuario= User::where('id', '=', $id)->first();
        return view('pages.usuarios.atualiza', compact('findUsuario'));
    }
}
