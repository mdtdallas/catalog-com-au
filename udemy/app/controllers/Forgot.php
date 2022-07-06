<?php

// Forgot Class

class Forgot extends Controller
{
    public function index()
    {
        
        $data ['title'] = "Forgot Page";
        
        $this->view('forgot', $data);
    }

}