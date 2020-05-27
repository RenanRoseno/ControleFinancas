<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('admin.profile.profile');
    }

    public function profileUpdate(Request $req){
        $dados = $req->all();

        if($dados['password'] != null)
            $dados['password'] = bcrypt($dados['password']);
        else
            unset($dados['password']);
            
        $update = auth()->user()->update($dados);

        if($update)
            return redirect()->route('admin.profile')->with('success','Atualizado com sucesso!');
        
        return redirect()->back()->with('error', 'Erro ao atualizar');

    }
}
