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
    $head['scss'] = $scss->compile('@import "main.scss";');

    $data['head'] = $head;
    $data['content']  = empty($page) ? '' : $page;
    $data['script'] = $script;

    return self::$CI->load->view('main', $data);
  }

  // SECURITY
  public static function security()
  {
    if (empty($_SESSION['flytor_user'])) {
      $system_message[] = BOOST::prepare_message('Access Denied', 'Kindly login with your email and password', 'Danger');
      BOOST::system_alert($system_message);
      return redirect('login');
      exit();
    }
    // USER DATA VARIABLE
    return $_SESSION['flytor_user'];
  }


  // SYSTEM MESSAGE FUNCTION
  // PREPARE MESSAGE
  public static function prepare_message($system_alert_title = '', $system_alert_message = '', $system_alert_state = '', $system_alert_delay = '')
  {
    $flash_data = array(
      'system_alert_title'   => $system_alert_title,
      'system_alert_message' => $system_alert_message,
      'system_alert_state'   => $system_alert_state,
      'system_alert_delay'   => $system_alert_delay,
    );
    return $flash_data;
  }

  // GENERATE MESSAGE
  public static function system_alert($flash_data  = array())
  {
    self::$CI->session->set_flashdata('system_alert', $flash_data);
  }

  // SWEET ALERT MESSAGE
  public static function system_sweet_alert($sweet_message = array())
  {
    self::$CI->session->set_flashdata('system_sweet_alert', $sweet_message);
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
