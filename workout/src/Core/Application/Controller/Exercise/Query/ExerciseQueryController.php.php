<?php

declare(strict_types=1);

namespace App\Core\Application\Controller\Exercise\Query;

use App\Core\Application\Model\Exercise\Query\GetExerciseQuery;
use App\Core\Application\Model\Exercise\Query\GetExercisesQuery;
use App\Core\Domain\Entity\Exercise;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

#[Route('/api')]
final class ExerciseQueryController extends AbstractController
{

    private MessageBusInterface $queryBus;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    #[Route('/exercises', name: 'api_users_get_all_query', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Get all users',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'items',
                    type: 'array',
                    items: new OA\Items(ref: '#/components/schemas/Exercise')
                )
            ]
        )
    )]
    public function getExercices(Request $request): void
    {

        $parameters = $request->query->all();

        $this->queryBus->dispatch(new GetExercisesQuery($parameters));
    }

    #[Route('/exercise/{id}', name: 'api_users_get_one_query', methods: ['GET'])]
    public function getExercice(#[MapEntity(mapping: ['id' => 'id'])] Exercise $exercise): void
    {

        $this->queryBus->dispatch(new GetExerciseQuery($exercise->getId()));
    }
}
