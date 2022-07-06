<?php

// About Class

class About extends Controller
{
    public function index()
    {
        
        $data ['title'] = "About Page";
        
        $this->view('about', $data);
    }

}