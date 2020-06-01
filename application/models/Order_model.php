<?php defined('BASEPATH') or die('Unauthorized Access');

class Order_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getOrders($userId = '')
  {
    $this->db->where('user_id', $userId);
    $orders = $this->db->get('orders');
    return $orders->result_array();
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

  public function createOrder($product = '', $userID = '', $type = 'normal')
  {
    $orderNumber = $this->generateOrderNumber() . $userID;
    $data = array(
      'user_id' => $userID,
      'number'  => $orderNumber,
      'type'    => $type
    );
    $this->db->insert('orders', $data);
    return array(
      'id'     => $this->db->insert_id(),
      'number' => $orderNumber
    );
  }

  public function addOrderProduct($product = '', $orderId = '')
  {
    $data = [
      'order_id' => $orderId,
      'name'     => $product['name'],
      'sku'      => $product['sku'],
      'price'    => empty($product['sale_price']) ? $product['regular_price'] : $product['sale_price'],
      'quantity' => $product['purchaseQuantity'],
      'image'    => $product['images'][0]['src_medium'],
      'unit'     => $product['attributes'][0]['option'],
      'href'     => $product['_links']['self'][0]['href']
    ];
    $this->db->insert('order_products', $data);

    // Deduct Stock Quantity API 

    return $this->db->insert_id();
  }

  public function updateOrder($orderId = '', $param = '')
  {
    $data['modified'] = date("Y-m-d H:i:s");

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
