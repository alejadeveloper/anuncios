<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    public function adPackage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdPackage::class);
    }
}
