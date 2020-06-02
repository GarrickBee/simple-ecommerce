<?php defined('BASEPATH') or die('Unauthorized Access');

class Product_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getProducts()
  {
    // Query Param
    $page = empty($this->input->get('page')) ? 1 : $this->input->get('page');
    // $type = empty($this->input->get('type')) ? 'variable' : $this->input->get('type');

    // if (empty($this->input->get('type'))) $param['category'] = $this->input->get('category');

    $param['page'] = $page;
    // $param['type'] =
    $products = $this->api->GET('/products', $param);
    $products['currentPage'] = $page;

    return $products;
  }

  public function getProduct($product_id)
  {
    $product = $this->api->GET('/products/' . $product_id);
    return $product;
  }
}// END CLASS
