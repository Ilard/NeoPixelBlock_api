<?php

namespace App\DataPersister;
use App\Entity\Drawing;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

class DrawingDataPersister implements ContextAwareDataPersisterInterface
{
     /**
     * @var EntityManagerInterface
     */
    private $_entityManager;
    private $_slugger;

    public function __construct(
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ) {
        $this->_entityManager = $entityManager;
        $this->_slugger = $slugger;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Drawing;
    }

    /**
     * @param Drawing $data
     */


    public function persist($data, array $context = [])
    {
        $data->setSlug(
            $this
                ->_slugger
                ->slug(strtolower($data->getTitle())). '-' .uniqid()
        );

        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->_entityManager->remove($data);
        $this->_entityManager->flush();
    }
}
