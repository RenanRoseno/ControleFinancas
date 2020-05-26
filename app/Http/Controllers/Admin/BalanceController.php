<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationForm;
use App\Models\Balance;

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
}
