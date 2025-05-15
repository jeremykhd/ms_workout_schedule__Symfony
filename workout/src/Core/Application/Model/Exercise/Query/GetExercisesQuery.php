<?php

declare(strict_types=1);

namespace App\Core\Application\Model\Exercise\Query;

final class GetExercisesQuery
{

    private array $parameters;
    private array $exercices;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    public function getExercices(): array
    {
        return $this->exercices;
    }

    public function setExercices(array $exercices): void
    {
        $this->exercices = $exercices;
    }
}
