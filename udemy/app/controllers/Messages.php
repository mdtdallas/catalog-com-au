<?php

// Messages Class

class Messages extends Controller
{
    public function index()
    {
        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $message = new Message();
        $data['messages'] = $message->findAll();
        $data ['title'] = "Messages Page";
        
        $this->view('admin/messages', $data);
    }

}