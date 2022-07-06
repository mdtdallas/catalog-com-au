<?php

// Name Class

class Name extends Controller
{
    public function index()
    {
        
        $data ['title'] = "Name Page";
        
        $this->view('page', $data);
    }

}