<?php

namespace Labs\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function findPrdId($id)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.id = :id');
        $qb->setParameter('id', $id);
        return $qb->getQuery()->getResult();
    }

    public function findOne($id)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.id = :id');
        $qb->setParameter('id', $id);
        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findAll()
    {
        return $this->findBy(array(), array('name' => 'ASC'));
    }

    /**
     * @param $type
     * @return array
     * Recupere les references produits dont le type a été envoyer
     */
    public function getProductType($type)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->where('p.type = :type');
        $qb->setParameter('type', $type);
        return $qb->getQuery()->getResult();
    }
}
