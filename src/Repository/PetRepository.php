<?php

namespace App\Repository;

use App\Entity\Pet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class PetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, Pet::class);
        $this->manager = $manager;
    }

    public function savePet($name, $type, $photoUrls)
    {
        $newPet = new Pet();

        $newPet
            ->setName($name)
            ->setType($type)
            ->setPhotoUrls($photoUrls);

        $this->manager->persist($newPet);
        $this->manager->flush();
    }
}