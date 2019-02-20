<?php

namespace OrderBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OrdersRepository extends EntityRepository {

    public function search($id, $marketplace, $idFlux, $orderStatusMarketplace, $orderStatusLengow, $orderId) {
        $query = $this->getEntityManager()->createQuery(
            'SELECT t
            FROM OrderBundle:Orders t
            WHERE 1 = 1
            '.(!empty($id) ? ' AND t.id = :id' : '').'
            '.(!empty($marketplace) ? ' AND t.marketplace LIKE :marketplace' : '').'
            '.(!empty($idFlux) ? ' AND t.idFlux = :idFlux' : '').'
            '.(!empty($orderStatusMarketplace) ? ' AND t.orderStatusMarketplace LIKE :orderStatusMarketplace' : '').'
            '.(!empty($orderStatusLengow) ? ' AND t.orderStatusLengow LIKE :orderStatusLengow' : '').'
            '.(!empty($orderId) ? ' AND t.orderId LIKE :orderId' : '').'
            '
        )
        ;

        if(!empty($id)) {
            $query->setParameter('id', $id);
        }
        if(!empty($marketplace)) {
            $query->setParameter('marketplace', '%'.$marketplace.'%');
        }
        if(!empty($idFlux)) {
            $query->setParameter('idFlux', $idFlux);
        }
        if(!empty($orderStatusMarketplace)) {
            $query->setParameter('orderStatusMarketplace', '%'.$orderStatusMarketplace.'%');
        }
        if(!empty($orderStatusLengow)) {
            $query->setParameter('orderStatusLengow', '%'.$orderStatusLengow.'%');
        }
        if(!empty($orderId)) {
            $query->setParameter('orderId', '%'.$orderId.'%');
        }

        $rs = $query->getResult();
        return $rs;
    }

}
