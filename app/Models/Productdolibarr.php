<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productdolibarr extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'label',
        'dolibarr_id',
    ];
}
