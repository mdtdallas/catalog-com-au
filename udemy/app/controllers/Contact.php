<?php

// Contact Class

class Contact extends Controller
{
    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $message = new Message();

            $headers = 'Return-Path: mdtdallas@hotmail.com' ."\r\n";
            $headers .= 'From: Sender <mdtdallas@hotmail.com>' . "\r\n";
            $email = 'mdtdallas@hotmail.com';
            $contactMessage = $_POST['name'] .' '. $_POST['message'] .' '. $_POST['email'];
            $cusMessage = $_POST['name'] .' '. $_POST['message'] .' '. $_POST['email'] .' '. 'This is a copy of your request for contact from Cat A Log';
            
            message(' Request Sent Seccessfully ');
            mail($email, ' Contact Us page request ', $contactMessage, $headers);
            mail($_POST['email'], ' Contact Request Submitted ', $cusMessage, $headers);
            $_POST['created'] = Date('d m Y');
            
            $message->insert($_POST);
        }

        $data ['title'] = "Contact Page";
        
        $this->view('contact', $data);
    }

}