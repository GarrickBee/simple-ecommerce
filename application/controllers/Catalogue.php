<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogue extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$page = empty($this->input->get('page')) ? 1 : $this->input->get('page');

		$param['page'] = $page;
		$products = $this->api->GET('/products', $param);

		$currentPage = $page;
		$totalPages = $products['header']['X-WP-TotalPages'];

		$view['products']     = $products['body'];
		$view['totalPages']   = $totalPages;
		$view['currentPage']  = $page;
		$view['previousPage'] = $currentPage <= 1 ? false : true;
		$view['nextPage']     = $currentPage >= $totalPages ? false : true;

		// Load View Pages
		$pages = $this->load->view('pages/home/home', $view, true);

		// Final View Load
		BOOST::loadPage($pages);
	}

	public function api()
	{
		$data['query'] = 'test';
		$result = $this->api->GET('/products');
		BOOST::print_array($result);
	}
}
