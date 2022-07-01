<?php
namespace App\Http\Data;

use Spatie\LaravelData\Data;

class HistoryData extends Data 
{
    public function __construct(
        public string $state,
        public float $price,
        public string $date,
        public int $id
    ){}
}