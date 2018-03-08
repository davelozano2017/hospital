<?php
class login extends Controller {

    public function __construct() {
        $_SESSION['token'] = TOKEN;
        $this->input = $this->model('account');
    }

    public function index() {
        $data['token'] = $_SESSION['token'];
        $this->view('pages/login',$data);
    }

    public function auth() {
        if(isset($_SESSION['token']) == $this->input->post('token')) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->model('account')->user_login($data);
        }
    }
    
}