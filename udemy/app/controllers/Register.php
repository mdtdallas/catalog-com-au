<?php

// Register Class

class Register extends Controller
{
    public function index()
    {
        $data['errors'] = [];

        $user = new User(); // from models folder

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($user->validate($_POST)) {
                $_POST['created'] = date('d-m-Y H:i:s');
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['role'] = 'user';
                $user->insert($_POST);

                message('Your have been registered. Please log in');
                redirect('login');
            }
        }
        $data['errors'] = $user->errors;
        $data['title'] = "Register";

        $this->view('register', $data);
    }
}
