<?php
namespace App\Http\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use App\Models\Cultivation;

class CultivationData extends Data 
{
    public function __construct(
        public string $name,
        public string $updated_at,
        public int $total,
        /** @var \App\Data\HistoryData[] */
        public DataCollection $history
    ) {
    }

    public static function fromModel(Cultivation $cultivation)
    {
        $history = $cultivation->history()->paginate(10);
        return new self(
            $cultivation->name,
            $cultivation->updated_at,
            $history->total,
            HistoryData::collection($history->data)
        );
    }
}