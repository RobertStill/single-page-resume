<?php

declare(strict_types=1);

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Volunteer
{
    public function __construct(
        public string $organization = '',
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
            organization: $data['organization'] ?? '',
            position: $data['position'] ?? '',
            url: $data['url'] ?? '',
            startDate: isset($data['startDate']) ? Carbon::parse($data['startDate']) : null,
            endDate: isset($data['endDate']) ? Carbon::parse($data['endDate']) : null,
            summary: $data['summary'] ?? '',
            highlights: $data['highlights'] ?? []
        );
    }
}
