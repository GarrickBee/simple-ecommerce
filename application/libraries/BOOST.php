<?php defined('BASEPATH') or die('Unauthorized Access');

use ScssPhp\ScssPhp\Compiler;

class BOOST
{
  public static $CI;
  function __construct()
  {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    self::$CI  = &get_instance();
  }

  public static function loadPage($page = '', $head = array(), $script = array())
  {
    // Load Scss 
    $scss = new Compiler();
    $scss->setImportPaths('assets/scss/');
    $scss->setFormatter('ScssPhp\ScssPhp\Formatter\Compressed');

    $data['scss']    = $scss->compile('@import "main.scss";');
    $data['head']    = $head;
    $data['content'] = empty($page) ? '' : $page;
    $data['script']  = $script;

    return self::$CI->load->view('main', $data);
  }

  // GENERATE MESSAGE
  public static function notify($message = 'No Message', $state = 'info')
  {
    return  self::$CI->session->set_flashdata('notify', array(
      "message" => $message,
      "state" => $state
    ));
  }


  public static function getModel($name = '')
  {
    $name = $name . '_model';
    self::$CI->load->model($name);
    return new $name;
  }

  /** 
   * For Debug Use
   */
  public static function print_array($array = '')
  {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    exit();
  }
}
