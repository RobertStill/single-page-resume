<?php

declare(strict_types=1);

namespace App\DataObjects;

readonly class Resume
{
    public function __construct(
        public ?Basics $basics = null,
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $basics = null;
        if (is_array($data['basics'] ?? null)) {
            $basics = Basics::fromArray($data['basics']);
        }

        return new self(
            basics: $basics,
            work: self::mapItems($data['work'] ?? [], Work::class),
            volunteer: self::mapItems($data['volunteer'] ?? [], Volunteer::class),
            education: self::mapItems($data['education'] ?? [], Education::class),
            awards: self::mapItems($data['awards'] ?? [], Award::class),
            certificates: self::mapItems($data['certificates'] ?? [], Certificate::class),
            publications: self::mapItems($data['publications'] ?? [], Publication::class),
            skills: self::mapItems($data['skills'] ?? [], Skill::class),
            languages: self::mapItems($data['languages'] ?? [], Language::class),
            interests: self::mapItems($data['interests'] ?? [], Interest::class),
            references: self::mapItems($data['references'] ?? [], Reference::class),
            projects: self::mapItems($data['projects'] ?? [], Project::class)
        );
    }

    private static function mapItems(array $items, string $class): array
    {
        if (!is_array($items)) {
            return [];
        }

        return array_map(
            fn (array $item) => $class::fromArray($item),
            $items
        );
    }
}
