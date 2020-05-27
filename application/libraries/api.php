<?php defined('BASEPATH') or die('Unauthorized Access');

use ScssPhp\ScssPhp\Compiler;

class api
{
  private $curl;
  private $url;
  private $api_password;
  private $api_username;

  function __construct()
  {
    // Api Url 
    $this->url = $_ENV['API_URL'];
    // Api Auth
    $this->api_password = $_ENV['API_PASSWORD'];
    $this->api_username = $_ENV['API_USERNAME'];

    // Init Curl  
    $this->curl = curl_init();
    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_USERPWD => $this->api_username . ":" . $this->api_password
    ));
  }

  public function GET($path = '', $param = '')
  {
    // Query Builder
    if (!empty($param)) $param = http_build_query($param);

    curl_setopt($this->curl, CURLOPT_URL, $this->url . $path . '?' . $param);

    try {
      $response = curl_exec($this->curl);
    } catch (Exception $e) {
      $response = 'Caught exception: ' . $e->getMessage() . "\n";
    }
    curl_close($this->curl);

    return $response;
  }
}
