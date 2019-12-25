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
            $id = $this->get('id_user');
            if ($id === null) {
                $user = $this->user->getUser();
            } else {
                $user = $this->user->getUser($id);
            }

            if ($user) {
                $this->response([
                    'status' => "true", 
                    'data' => $user
                ], 200);
            } else {
                $this->response([
                    'status' => "false", 
                    'massage' => 'id not found'
                ], 404);
            }
        }
        public function index_post()
        {
            $data = [
                'username' => $this->post('username'),
                'password' => $this->post('password'),
                // 'level' => $this->post('level')
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
            $id = $this->put('id_user');
            $data = [
                'id_user' => $this->put('id_user'),
                'username' => $this->put('username'),
                'password' => $this->put('password'),
                'level' => $this->put('level'),
                
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

        public function index_delete()
        {
            $id = $this -> delete('id_user');
            if ($id === null) {
                $this->response([
                    'status' => "false",
                    'massage' => 'provide an id!'
                ], 404);
            } else {
                if ($this->user->deleteUser($id)>0) {
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'massage' => 'Deleted'
                    ], 200);
                } else {
                    $this->response([
                        'status' => false,
                        'massage' => 'id not found'
                    ], 400);
                }
            }
        }
    
    }
    
    /* End of file User.php */
    
?>