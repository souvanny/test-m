<?php
/**
 * Created by PhpStorm.
 * User: ssise
 * Date: 19/02/2019
 * Time: 22:58
 */

namespace App\Model;

use OrderBundle\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;

class OrderModel
{

    private $xml = '';
    private $webRoot = '';
    private $entityManager = null;

    /**
     * OrderModel constructor.
     * @param $rootDir
     * @param $entityManager
     */
    public function __construct($rootDir, $entityManager)
    {
        $this->webRoot = realpath($rootDir . '/../web');
        $this->entityManager = $entityManager;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getList(Request $request)
    {
        $id = $request->get('id');
        $marketplace = $request->get('marketplace');
        $idFlux = $request->get('idFlux');
        $orderStatusMarketplace = $request->get('orderStatusMarketplace');
        $orderStatusLengow = $request->get('orderStatusLengow');
        $orderId = $request->get('orderId');

        if (empty($id) && empty($marketplace) && empty($idFlux) && empty($orderStatusMarketplace) && empty($orderStatusLengow) && empty($orderId)) {
            return $this->entityManager->getRepository('OrderBundle:Orders')->findAll();
        } else {
            return $this->entityManager->getRepository('OrderBundle:Orders')->search($id, $marketplace, $idFlux, $orderStatusMarketplace, $orderStatusLengow, $orderId);
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->entityManager->getRepository('OrderBundle:Orders')->find($id);
    }

    /**
     * process
     */
    public function processImport()
    {
        $this->loadFile();
        $this->importToDb();
    }

    /**
     *
     */
    private function loadFile()
    {
        $this->xml = simplexml_load_file($this->webRoot . "/xml/orders-test.xml");
    }

    /**
     * importToDb
     */
    private function importToDb()
    {
        $orders = $this->xml->orders;
        foreach ($orders->children() as $order) {
            $ordersEntity = new Orders();
            $ordersEntity->setMarketplace($order->marketplace);
            $ordersEntity->setIdFlux($order->idFlux);
            $ordersEntity->setOrderStatusMarketplace($order->order_status->marketplace);
            $ordersEntity->setOrderStatusLengow($order->order_status->lengow);
            $ordersEntity->setOrderId($order->order_id);
            $this->entityManager->persist($ordersEntity);
            $this->entityManager->flush();
        }
    }

}