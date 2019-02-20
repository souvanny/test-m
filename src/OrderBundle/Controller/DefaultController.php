<?php

namespace OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="order_list")
     */
    public function indexAction(Request $request)
    {
        $orderModel = $this->get('order_model');
        $ordersList = $orderModel->getList($request);
        return $this->render('@Order/Order/index.html.twig', [
            'orderList' => $ordersList
        ]);
    }


    /**
     * @Route("/view/{id}", name="order_view")
     */
    public function viewAction($id)
    {
        $orderModel = $this->get('order_model');
        $order = $orderModel->getById($id);
        return $this->render('@Order/Order/view.html.twig', [
            'order' => $order
        ]);
    }
}
