<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadesDeSaude extends Model
{
    protected $fillable = [
        'name', 'location', 'region'
    ];
}
