<?php
    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class User extends CI_Controller {
    
        use REST_Controller {
            REST_Controller::__construct as private __resTraitConstruct;
        }
    
        function __construct()
        {
            // Construct the parent class
            parent::__construct();
            $this->__resTraitConstruct();
            $this->load->model('api/user_model', 'user');
    
        }

        public function index_get()
        {
            $username = $this->get('username');
            $password = $this->get('password');
            
            if ($username === null && $password === null) {
                $login_proses = $this->user->login(null, null);
            } else {
                $login_proses = $this->user->login($username, $password);
            }
            
            if ($login_proses) {
                $this->response([
                    'status' => "true", 
                    'data' => $login_proses
                ], 200);
            } else {
                $this->response([
                    'status' => "false", 
                    'massage' => 'user not found'
                ], 404);
            }
        }
        public function index_post()
        {
            $data = [
                'username' => $this->post('username'),
                'password' => $this->post('password'),
                'level' => $this->post('level')
            ];
            if ($this->user->register($data) > 0) {
                $this->response([
                    'status' => "true",
                    'massage' => 'new user has been created'
                ], 200);
            } else {
                $this->response([
                    'status' => "false",
                    'massage' => 'Failed'
                ], 400);
            }   
        }
        public function index_put()
        {
            $id = $this->put('id');
            $data = [
                'id' => $this->put('id'),
                'username' => $this->put('username'),
                'password' => $this->put('password'),
                'level' => $this->put('level')
            ];
            if ($this->user->updateUser($data, $id)) {
                $this->response([
                    'status' => true,
                    'massage' => 'user has been updated'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'Failed'
                ], 400);
            }
        }
    
    }
    
    /* End of file User.php */
    
?>