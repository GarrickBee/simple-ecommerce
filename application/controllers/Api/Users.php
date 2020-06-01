<?php
defined('BASEPATH') or exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Users  extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }


    public function register_post()
    {
        $userParam = $this->post('user');

        $userModel = BOOST::getModel('user');
        $newUser = $userModel->registerUser($userParam);

        if (!$newUser['success']) {
            return     $this->response($newUser, parent::HTTP_BAD_REQUEST);
        }
        $userData = $newUser['data'];

        // Generate Token
        $token = AUTHORIZATION::generateToken([
            'email' => $userData['email'],
            'password' => $userData['password'],
            'secret' => $_ENV['SECRET']
        ]);

        $response = [
            'success' => 'true',
            'message' => 'User Created Success',
            'token' => $token
        ];
        $this->response($response, parent::HTTP_OK);
    }

    public function login_post()
    {
        $userParam = $this->post('user');
        $userModel = BOOST::getModel('user');
        $userData = $userModel->userLogin($userParam);

        if (!$userData['success']) {
            return $this->response($userData, parent::HTTP_NOT_FOUND);
        }

        // Create a token from the user data and send it as reponse
        $token = AUTHORIZATION::generateToken([
            'email' => $userData['data']['email'],
            'password' => $userData['data']['password'],
            'secret' => $_ENV['SECRET']
        ]);

        // Set Cookie
        $cookie = array(
            'name'   => 'loginToken',
            'value'  => $token,
        );
        $this->input->set_cookie($cookie);

        $response = [
            'success' => 'true',
            'message' => 'Login Success',
            'token' => $token
        ];
        $this->response($response, parent::HTTP_OK);
    }

    public function validate_post()
    {
        $userModel = BOOST::getModel('user');
        $loginToken = $this->post('token');
        $tokenData = (array) AUTHORIZATION::validateToken($loginToken);

        if ($tokenData['secret'] !== $_ENV['SECRET']) {
            return   $this->response(array('success' => false), parent::HTTP_NOT_FOUND);
        }
        $userLogin = $userModel->validateUser($tokenData);

        if (!$userLogin['success']) {
            return   $this->response($userLogin, parent::HTTP_NOT_FOUND);
        }

        return $this->response($userLogin, parent::HTTP_OK);
    }
}
