<?php

declare(strict_types=1);

namespace App\Core\Domain\Repository;

use App\Core\Domain\Entity\Exercise;
use Doctrine\DBAL\LockMode;

interface ExerciseRepositoryInterface
{
    public function find(mixed $id, LockMode|int|null $lockMode = null, int|null $lockVersion = null);
    public function findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null);
    public function fetchAll(): array;
    public function save(Exercise $exercise): void;
    public function delete(Exercise $exercise);
}
