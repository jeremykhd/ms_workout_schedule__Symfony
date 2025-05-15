<?php

declare(strict_types=1);

use App\Core\Domain\Entity\Exercise;
use App\Core\Domain\Repository\ExerciseRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ExerciseRepository extends ServiceEntityRepository implements ExerciseRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exercise::class);
    }

    public function save(Exercise $exercice): void
    {
        $this->getEntityManager()->persist($exercice);
        $this->getEntityManager()->flush();
    }

    public function fetchAll(): array
    {
        return $this->findAll();
    }

    public function delete(Exercise $exercise)
    {
        $this->getEntityManager()->remove($exercise);
        $this->getEntityManager()->flush();
    }
}
