<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    private $page;
    private $view = array();
    private $userData;

    public function __construct()
    {
        parent::__construct();
        // Check User Login
        $this->userData = $this->validateLogin();

        if (!$this->userData['success']) {
            BOOST::notify('Login needed');
            return redirect('/');
        };
    }

    public function index()
    {
        return $this->dashboard();
    }

    public function dashboard()
    {
        $orderModel = BOOST::getModel('order');

        $orders = $orderModel->getOrders($this->userData['data']['id']);

        $this->view['orders'] = $orders;
        $this->page = $this->load->view('pages/member/dashboard', $this->view, true);
        BOOST::loadPage($this->page);
    }

    public function order($orderNumber = '')
    {
        // Load Model
        $orderModel = BOOST::getModel('order');

        // Error Check 
        if (empty($orderNumber)) {
            BOOST::notify('Order Not Found', 'warning');
            return redirect('member');
        }

        // Verify Product Number with Auth
        $order = $orderModel->getAuthOrder($orderNumber, $this->userData['data']['id']);
        if (empty($order)) {
            BOOST::notify('Order Not Found', 'warning');
            return redirect('member');
        }

        $products = $orderModel->getOrderProducts($order['id']);

        // Load View
        $this->view['order'] = $order;
        $this->view['products'] = $products;
        $this->page = $this->load->view('pages/member/order', $this->view, true);
        BOOST::loadPage($this->page);
    }

    public function logout()
    {
        delete_cookie('loginToken');
        BOOST::notify('Log Out Successfully', 'success');
        return redirect('/');
    }

    private function validateLogin()
    {
        $loginToken = get_cookie('loginToken');
        $userModel = BOOST::getModel('user');
        $tokenData = (array) AUTHORIZATION::validateToken($loginToken);

        if ($tokenData['secret'] !== $_ENV['SECRET']) {
            return false;
        }

        $userLogin = $userModel->validateUser($tokenData);

        if (!$userLogin['success']) {
            return false;
        }

        return $userLogin;
    }
}
