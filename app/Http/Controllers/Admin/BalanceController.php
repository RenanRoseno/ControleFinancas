<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationForm;
use App\Models\Balance;
use App\User;

class BalanceController extends Controller
{
    public function index()
    {

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin/balance/index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }
    public function store(MoneyValidationForm $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->val);

        if ($response['success'])
            return redirect()->route('balance')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    public function withdrawn()
    {
        return view('admin.balance.withdrawn');
    }

    public function withdrawnStore(MoneyValidationForm $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdrawn($request->val);

        if ($response['success'])
            return redirect()->route('balance')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function transferStore(Request $req, User $user)
    {
        $usuario = $user->getUsuario($req->recebedorInfo);
        $balance = auth()->user()->balance;

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuário não encontrado!');
        }

        if ($usuario->id == auth()->user()->id) {
            return redirect()->back()->with('error', 'Não pode transferir para você mesmo!');
        }

        return view('admin.balance.transfer_confirm', compact('usuario', 'balance'));
    }

    public function transferSend(MoneyValidationForm $req, User $user)
    {
        $usuario = $user->find($req->usuario_id);

        if (!$usuario) {
            return redirect()->route('balance.transfer')->with('success', 'Recebedor não encontrado!');
        }
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($req->val, $usuario);

        if ($response['success'])
            return redirect()->route('balance')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    public function historic()
    {
        $historics = auth()->user()->historics()->get();

        return view('admin.balance.historic', compact('historics'));
    }
}
