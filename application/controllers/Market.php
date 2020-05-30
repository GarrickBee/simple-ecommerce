<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Market extends CI_Controller
{
	private $page;
	private $view = array();

	public function index()
	{
		$productModel = BOOST::getModel('product');

		$products = $productModel->getProducts();

		$totalPages = $products['header']['X-WP-TotalPages'];
		$currentPage = $products['currentPage'];

		// View Datas
		$this->view['products']     = $products['body'];
		$this->view['totalPages']   = $totalPages;
		$this->view['currentPage']  = $currentPage;
		$this->view['previousPage'] = $currentPage <= 1 ? false : true;
		$this->view['nextPage']     = $currentPage >= $totalPages ? false : true;

		// Generate Page
		$this->page = $this->load->view('pages/market/catalogue', $this->view, true);

		BOOST::loadPage($this->page);
	}

	public function product($id = '')
	{
		if (empty($id)) return 	$this->load->view('404');

		$productModel = BOOST::getModel('product');
		$product = $productModel->getProduct($id);

		$this->view['product']     = $product['body'];

		// Generate Page
		$this->page = $this->load->view('pages/market/product', $this->view, true);
		BOOST::loadPage($this->page);
	}
}
