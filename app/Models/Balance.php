<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Balance extends Model
{
    //
    public $timestamps = false;

    public function deposit(float $value): array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();


        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $this->amount,
            'date'         => date('Ymd'),
        ]);


        if ($deposit) {
            DB::commit();
            return [
                'success' => true,
                'message' => 'Sucesso ao Depositar'
            ];
        } else {
            DB::rollback();
            return [
                'success' => true,
                'message' => 'Falha ao depositar'
            ];
        }
    }

    public function withdrawn(float $value) : Array
    {
        if($this->amount < $value)
        return [
            'success' => false,
            'message' => 'Saldo insuficiente',
        ];


        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdrawn = $this->save();


        $historic = auth()->user()->historics()->create([
            'type'          => 'O',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $this->amount,
            'date'         => date('Ymd'),
        ]);


        if ($withdrawn) {
            DB::commit();
            return [
                'success' => true,
                'message' => 'Sucesso ao Sacar'
            ];
        } else {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Falha ao Sacar'
            ];
        }
    }
}
