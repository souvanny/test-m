<?php

namespace OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="OrderBundle\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="marketplace", type="string", length=10, nullable=false)
     */
    private $marketplace;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_flux", type="integer", nullable=false)
     */
    private $idFlux;

    /**
     * @var string
     *
     * @ORM\Column(name="order_status_marketplace", type="string", length=30, nullable=false)
     */
    private $orderStatusMarketplace;

    /**
     * @var string
     *
     * @ORM\Column(name="order_status_lengow", type="string", length=30, nullable=false)
     */
    private $orderStatusLengow;

    /**
     * @var string
     *
     * @ORM\Column(name="order_id", type="string", length=30, nullable=false)
     */
    private $orderId;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set marketplace
     *
     * @param string $marketplace
     *
     * @return Orders
     */
    public function setMarketplace($marketplace)
    {
        $this->marketplace = $marketplace;

        return $this;
    }

    /**
     * Get marketplace
     *
     * @return string
     */
    public function getMarketplace()
    {
        return $this->marketplace;
    }

    /**
     * Set idFlux
     *
     * @param integer $idFlux
     *
     * @return Orders
     */
    public function setIdFlux($idFlux)
    {
        $this->idFlux = $idFlux;

        return $this;
    }

    /**
     * Get idFlux
     *
     * @return integer
     */
    public function getIdFlux()
    {
        return $this->idFlux;
    }

    /**
     * Set orderStatusMarketplace
     *
     * @param string $orderStatusMarketplace
     *
     * @return Orders
     */
    public function setOrderStatusMarketplace($orderStatusMarketplace)
    {
        $this->orderStatusMarketplace = $orderStatusMarketplace;

        return $this;
    }

    /**
     * Get orderStatusMarketplace
     *
     * @return string
     */
    public function getOrderStatusMarketplace()
    {
        return $this->orderStatusMarketplace;
    }

    /**
     * Set orderStatusLengow
     *
     * @param string $orderStatusLengow
     *
     * @return Orders
     */
    public function setOrderStatusLengow($orderStatusLengow)
    {
        $this->orderStatusLengow = $orderStatusLengow;

        return $this;
    }

    /**
     * Get orderStatusLengow
     *
     * @return string
     */
    public function getOrderStatusLengow()
    {
        return $this->orderStatusLengow;
    }

    /**
     * Set orderId
     *
     * @param string $orderId
     *
     * @return Orders
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}
