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

		// Notification Button
		$notifications = array();
		$userData = $this->validateLogin();
		if ($userData) {
			$orderModel = BOOST::getModel('order');
			$notifications = $orderModel->getNotifyOrders($userData['data']['id']);
		}

		// View Datas
		$this->view['products']     = $products['body'];
		$this->view['totalPages']   = $totalPages;
		$this->view['currentPage']  = $currentPage;
		$this->view['previousPage'] = $currentPage <= 1 ? false : true;
		$this->view['nextPage']     = $currentPage >= $totalPages ? false : true;
		$this->view['notifications'] = $notifications;

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

	public function order()
	{
		// Load Model 
		$orderModel = BOOST::getModel('order');
		$productModel = BOOST::getModel('product');

		// Verify Login
		$userData = $this->validateLogin();
		if (!$userData) {
			BOOST::notify('Kindly Login Before Purchase');
			return 	redirect('/');
		};

		// Check param
		$productPost = $this->input->post('product');

		if (empty($productPost)) {
			BOOST::notify('No Product Selected');
			return 	redirect('/');
		}
		if (empty($productPost['quantity'])) {
			BOOST::notify('Product quantity cannot less than zero', 'danger');
			return 	redirect('/');
		}

		$product = $productModel->getProduct($productPost['variationId']);

		if (!$product['success']) {
			BOOST::notify($product['message'], 'danger');
			return 	redirect('/');
		}

		$productBody = $product['body'];
		$productBody['purchaseQuantity'] = $productPost['quantity'];

		// Generate Product Detail for order
		$order = $orderModel->createOrder($productBody, $userData['data']['id']);

		// Add Product 
		$orderProductId = $orderModel->addOrderProduct($productBody, $order['id']);

		// Advance to payment Gateway 

		// Assume Success Payment and direct to payment call back
		redirect("payment/callback/?order={$order['number']}&payment=success&hash=hash");
	}

	private function validateLogin()
	{
		$loginToken = get_cookie('loginToken');
		if (empty($loginToken)) {
			return false;
		}
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
