<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Historic extends Model
{
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];


    public function type($type = null)
    {
        $types =  [
            'I' => 'Entrada',
            'O' => 'Saída',
            'T' => 'Transferência',
        ];

        if (!$type)
            return $types;

        if ($this->user_id_transaction != null && $type == 'I')
            return 'Recebido';

    return $types[$type];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userS(){
        return $this->belongsTo(User::class,'user_id_transaction');
    }
}
