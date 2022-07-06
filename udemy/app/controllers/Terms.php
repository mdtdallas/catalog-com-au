<?php

// Terms Class

class Terms extends Controller
{
    public function index()
    {
        
        $data ['title'] = "Terms Page";
        
        $this->view('terms', $data);
    }

}