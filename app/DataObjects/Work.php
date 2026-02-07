<?php

declare(strict_types=1);

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Work
{
    public function __construct(
        public string $name = '',
        public string $position = '',
        public string $url = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $summary = '',
        public array $highlights = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            position: $data['position'] ?? '',
            url: $data['url'] ?? '',
            startDate: isset($data['startDate']) ? Carbon::parse($data['startDate']) : null,
            endDate: isset($data['endDate']) ? Carbon::parse($data['endDate']) : null,
            summary: $data['summary'] ?? '',
            highlights: $data['highlights'] ?? []
        );
    }
}
