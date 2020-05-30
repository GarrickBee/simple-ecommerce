<?php defined('BASEPATH') or die('Unauthorized Access');

use ScssPhp\ScssPhp\Compiler;

class api
{
  private $curl;
  private $url;
  private $api_password;
  private $api_username;
  private $response;

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
      CURLOPT_VERBOSE => true,
      CURLOPT_HEADER => true,
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
    $query = (!empty($param)) ? '?' . http_build_query($param) : '';

    curl_setopt($this->curl, CURLOPT_URL, $this->url . $path . $query);

    try {
      $tempResponse    = curl_exec($this->curl);
      if (curl_error($this->curl)) {

        curl_close($this->curl);

        return $this->response = array(
          'success' => false,
          'error' => curl_error($this->curl),
        );
      }

      $header_size = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
      $body        = substr($tempResponse, $header_size);
      $header      = $this->extract_headers($tempResponse);

      curl_close($this->curl);
      return $this->response = array(
        'success' => true,
        'header'  => $header,
        'body'    => json_decode($body, true),
      );
    } catch (Exception $e) {

      curl_close($this->curl);
      return $this->response = array(
        'success' => false,
        'error'   => 'Caught exception: ' . $e->getMessage() . "\n",
      );
    }
  }

  private function extract_headers($response)
  {
    $headers = array();

    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line)
      if ($i === 0)
        $headers['http_code'] = $line;
      else {
        list($key, $value) = explode(': ', $line);
        $headers[$key] = $value;
      }

    return $headers;
  }
}
