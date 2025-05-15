<?php

declare(strict_types=1);

namespace App\Core\Application\Service;

use App\Core\Domain\Entity\Exercise;
use ExerciseRepository;
use Symfony\Component\Serializer\SerializerInterface;

class ExerciseService
{

    private ExerciseRepository $exerciseRepository;
    private SerializerInterface $serializer;

    public function __construct(ExerciseRepository $exerciseRepository, SerializerInterface $serializer)
    {
        $this->exerciseRepository = $exerciseRepository;
        $this->serializer = $serializer;
    }

    public function getExercises(array $parameters): float|int|bool|\ArrayObject|array|string|null
    {
        $exercises = $this->exerciseRepository->findBy($parameters);
        return $this->serializer->serialize($exercises, 'null', ['groups' => 'exercises:list']);
    }

    public function getExercise(int $id): float|int|bool|\ArrayObject|array|string|null
    {
        $exercise = $this->exerciseRepository->findOneBy(['id' => $id]);
        return $this->serializer->serialize($exercise, 'null', ['groups' => 'exercises:list']);
    }

    public function createExercise(array $properties): Exercise
    {
        $exercise = Exercise::registerExercise(
            $properties['id'],
            $properties['title'],
            $properties['description'],
        );

        $this->exerciseRepository->save($exercise);

        return $exercise;
    }
}
