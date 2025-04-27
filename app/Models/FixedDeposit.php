<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_name',
        'amount',
        'start_date',
        'end_date',
    ];
}
