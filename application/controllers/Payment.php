<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    private $page;
    private $view = array();

    public function index()
    {
    }

    public function callback()
    {
        $param = $this->input->get();
        $orderModel = BOOST::getModel('order');
        //verify hash 

        //verify order 
        $order = $orderModel->getOrder($param['order']);
        if (empty($order)) return false;

        if ($param['payment'] !== 'success') return false;

        $orderModel->updateOrder($order['id'], array(
            'payment' => 'paid',
            'status' => 'processing'
        ));
        BOOST::notify('Payment Success', 'success');
        // Success 
        redirect('member');
    }
}
