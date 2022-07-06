<?php

// Breeds Class

class Breeds extends Controller
{
    public function index()
    {
              
        $data = [];
        
        $this->view('cats', $data);
    }

}