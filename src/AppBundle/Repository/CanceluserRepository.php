<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CanceluserRepository extends EntityRepository
{
    public function createFindAllQuery()
    {
        $query = $this->_em->createQuery(
            "
            SELECT cu
            FROM AppBundle:CancelUser cu
          "
        );

        return $query;
    }

    public function createFindOneByIdQuery($id)
    {
        $query = $this->_em->createQuery(
            "
            SELECT cu
            FROM AppBundle:CancelUser cu
            WHERE cu.id = :id
          "
        );

        $query->setParameter('id', $id);
        return $query;
    }

}