<?php defined('BASEPATH') or die('Unauthorized Access');

class User_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('email');
  }

  public function registerUser($param = '')
  {
    if (!filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
      return array(
        'success' => false,
        'error' => 'Invalid email',
      );
    }

    if (empty($param['password']) || empty($param['repassword'])) {
      return array(
        'success' => false,
        'message' => 'Empty password',
      );
    }

    if ($param['password'] !== $param['repassword']) {
      return array(
        'success' => false,
        'message' => 'Password not match',
      );
    }

    // Check User Exist 
    $this->db->where('email', $param['email']);
    $user = $this->db->get('users');
    if ($user->num_rows() > 0) {
      return array(
        'success' => false,
        'message' => 'User Exist'
      );
    }

    $this->db->reset_query();
    $password_hash = password_hash($param['password'], PASSWORD_DEFAULT);
    // Create user
    $this->db->insert('users', array(
      'email' => $param['email'],
      'password' => $password_hash,
    ));

    return array(
      'success' => true,
      'data' => [
        'id' => $this->db->insert_id(),
        'email' => $param['email'],
        'password' => $param['email']
      ]
    );
  }

  public function userLogin($param = '')
  {
    if (!filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
      return array(
        'success' => false,
        'error' => 'Invalid email',
      );
    }

    if (empty($param['password'])) {
      return array(
        'success' => false,
        'message' => 'Empty password',
      );
    }

    // Check User Exist 
    $this->db->where('email', $param['email']);
    $user = $this->db->get('users');
    if ($user->num_rows() <= 0) {
      return array(
        'success' => false,
        'message' => 'User not found'
      );
    }
    // Query User
    $user = $user->row_array();
    // CHeck Password
    if (!password_verify($param['password'], $user['password'])) {
      return array(
        'success' => false,
        'message' => 'Passowrd Or Email Invalid'
      );
    }

    return array(
      'success' => true,
      'data' => $user
    );
  }

  public function validateUser($param = '')
  {
    if (!filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
      return array(
        'success' => false,
        'error' => 'Invalid email',
      );
    }

    if (empty($param['password'])) {
      return array(
        'success' => false,
        'message' => 'Empty password',
      );
    }

    // Check User Exist 
    $this->db->where('email', $param['email']);
    $user = $this->db->get('users');
    if ($user->num_rows() <= 0) {
      return array(
        'success' => false,
        'message' => 'User not found'
      );
    }

    return array(
      'success' => true,
      'data' => $user->row_array()
    );
  }
}
