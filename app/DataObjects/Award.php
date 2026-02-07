<?php

declare(strict_types=1);

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Award
{
    public function __construct(
        public string $title = '',
        public ?Carbon $date = null,
        public string $awarder = '',
        public string $summary = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? '',
            date: isset($data['date']) ? Carbon::parse($data['date']) : null,
            awarder: $data['awarder'] ?? '',
            summary: $data['summary'] ?? ''
        );
    }
}
