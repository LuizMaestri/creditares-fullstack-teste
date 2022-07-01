<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'price',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function cultivation()
    {
        return $this->belongsTo(App\Cultivation::class, 'id');
    }

}
