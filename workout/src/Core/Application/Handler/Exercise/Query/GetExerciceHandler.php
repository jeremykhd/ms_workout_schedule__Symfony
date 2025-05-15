<?php

declare(strict_types=1);

namespace App\Core\Application\Handler\Exercise\Query;

use App\Core\Application\Model\Exercise\Query\GetExerciseQuery;
use App\Core\Application\Service\ExerciseService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class GetExerciceHandler
{

    private ExerciseService $exerciseService;

    public function __construct(ExerciseService $exerciseService)
    {
        $this->exerciseService = $exerciseService;
    }

    public function __invoke(GetExerciseQuery $query): void
    {
        $exercise = $this->exerciseService->getExercise($query->getId());
        $query->setExercise($exercise);
    }
}
