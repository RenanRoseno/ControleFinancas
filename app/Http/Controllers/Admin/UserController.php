<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function profileUpdate(Request $req)
    {
        $user = auth()->user();
        $dados = $req->all();

        if ($dados['password'] != null)
            $dados['password'] = bcrypt($dados['password']);
        else
            unset($dados['password']);

        $dados['image'] = $user->image;

        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            if ($user->image)
                $name = $user->image;
            else
                $name = $user->id.kebab_case($user->name);

            $extension = $req->image->extension();
            $nameFile = "{$name}.{$extension}";
            $dados['image'] = $nameFile;
            
            $upload = $req->image->storeAs('users', $nameFile);

            
            if(!$upload){
                return redirect()->back()->with('error', 'Erro ao fazer upload da imagem');
            }
        }

        $update = $user->update($dados);

        if ($update)
            return redirect()->route('admin.profile')->with('success', 'Atualizado com sucesso!');

        return redirect()->back()->with('error', 'Erro ao atualizar');
    }
}
