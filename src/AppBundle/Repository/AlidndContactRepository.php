<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class AlidndContactRepository extends EntityRepository
{
    public function createFindAllQuery()
    {
        $query = $this->_em->createQuery(
          "
            SELECT ac
            FROM AppBundle:AlidndContact ac
          "
        );

        return $query;
    }

    public function createFindOneByIdQuery($id)
    {
        $query = $this->_em->createQuery(
            "
            SELECT ac
            FROM AppBundle:AlidndContact ac
            WHERE ac.id = :id
          "
        );

        $query->setParameter('id', $id);
        return $query;
    }

}