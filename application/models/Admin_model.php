<?php defined('BASEPATH') or die('Unauthorized Access');

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getOrders()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $orders = $this->db->get()->result_array();
        return $orders;
    }

    public function getOrder($orderNumber = '')
    {
        $this->db->where('number', $orderNumber);
        $order = $this->db->get('orders');
        return $order->row_array();
    }

    public function getAuthOrder($orderNumber = '', $userID = '')
    {
        $this->db->where('user_id', $userID);
        $this->db->where('number', $orderNumber);
        $order = $this->db->get('orders');
        return $order->row_array();
    }

    public function getOrderProducts($orderId = '')
    {
        $this->db->where('order_id', $orderId);
        $products = $this->db->get('order_products')->result_array();
        return $products;
    }

    public function updateOrder($orderId = '', $param = '')
    {
        $data['modified'] = date("Y-m-d H:i:s");
        $data['notify'] = 'notify'; // Update User Notifications

        if (!empty($param['status'])) $data['status'] = $param['status'];
        if (!empty($param['payment'])) $data['payment'] = $param['payment'];

        $this->db->where('id', $orderId);
        $this->db->update('orders', $data);
        return true;
    }

    private function generateOrderNumber()
    {
        $orderNumber = "ORD" . date("Ymd") . substr(md5(time()), 0, 3);
        return $orderNumber;
    }
}// END CLASS
