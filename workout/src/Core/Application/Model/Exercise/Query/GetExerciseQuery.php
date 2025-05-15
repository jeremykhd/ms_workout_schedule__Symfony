<?php

declare(strict_types=1);

namespace App\Core\Application\Model\Exercise\Query;

use App\Core\Domain\Entity\Exercise;

final class GetExerciseQuery
{

    private int $id;
    private null|array|Exercise $exercise;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->exercise = new Exercise();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param array<int, Item> $items
     */
    public function getExercise(): null|array|Exercise
    {
        return $this->exercise;
    }

    public function setExercise(null|array|Exercise $exercise): void
    {
        $this->exercise = $exercise;
    }
}
