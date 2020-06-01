<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $page;
    private $view = array();

    public function index()
    {
        return;
    }

    public function dashboard()
    {
        // Quer$y All Order
        $adminModel = BOOST::getModel('admin');
        $orders = $adminModel->getOrders();

        // Load View 
        $this->view['orders'] = $orders;

        // custom script
        $this->script = array(
            base_url('assets/js/admin/dashboard.js')
        );

        $this->page = $this->load->view('pages/admin/dashboard', $this->view, true);
        BOOST::loadPage($this->page, '', $this->script);
    }


    public function order($orderNumber = '')
    {
        // Load Model
        $adminModel = BOOST::getModel('admin');

        // Error Check 
        if (empty($orderNumber)) {
            BOOST::notify('Order Not Found', 'warning');
            return redirect('admin');
        }

        // Verify Product Number
        $order = $adminModel->getOrder($orderNumber);
        if (empty($order)) {
            BOOST::notify('Order Not Found', 'warning');
            return redirect('admin');
        }

        if ($this->input->post('orderUpdate')) {
            BOOST::notify('Status Updated', 'success');
            $adminModel->updateOrder($order['id'], $this->input->post('orderUpdate'));
            return redirect(current_url());
        }

        $products = $adminModel->getOrderProducts($order['id']);

        // Load View
        $this->view['order'] = $order;
        $this->view['products'] = $products;
        $this->page = $this->load->view('pages/admin/order', $this->view, true);
        BOOST::loadPage($this->page);
    }
}
