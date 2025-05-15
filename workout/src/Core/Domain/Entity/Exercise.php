<?php

declare(strict_types=1);

namespace App\Core\Domain\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Exercise',
    description: 'Exercise entity',
    required: ['id', 'title', 'description']
)]
class Exercise
{
    #[OA\Property(
        description: 'The unique identifier of the exercise',
        type: 'integer',
        format: 'int64'
    )]
    #[Groups(['exercise:list', 'exercise:item'])]
    private int $id;

    #[OA\Property(
        description: 'The title of the exercise',
        type: 'string',
        example: 'Push-ups'
    )]
    #[Groups(['exercise:list', 'exercise:item'])]
    private string $title;

    #[OA\Property(
        description: 'The description of the exercise',
        type: 'string',
        example: 'A classic bodyweight exercise that targets the chest, shoulders, and triceps'
    )]
    #[Groups(['exercise:list', 'exercise:item'])]
    private string $description;

    public function __construct() {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public static function registerExercise(
        int $id,
        string $title,
        string $description
    ): Exercise {

        $exercise = new Exercise();
        $exercise->setId($id);
        $exercise->setTitle($title);
        $exercise->setDescription($description);

        return $exercise;
    }
}
